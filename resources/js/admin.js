var tinymceConfig = {
  selector: '.editor',
  menubar: false,
  statusbar: false,
  mode: 'inline',
  plugins: ["lists", "link", "paste"],
  toolbar: [
    {
        name: 'history', items: [ 'undo', 'redo' ]
      },
      {
        name: 'styles', items: [ 'styleselect' ]
      },
      {
        name: 'formatting', items: [ 'bold', 'italic', 'underline', "numlist", "bullist", 'link']
      },
      {
        name: 'alignment', items: [ 'alignleft', 'aligncenter', 'alignright', 'alignjustify' ]
      },
      {
        name: 'indentation', items: [ 'outdent', 'indent' ]
      }
  ],
  invalid_styles: 'color font-size font-family background background-image',
}

var tinymceConfigSimple = {
  selector: '.simple-editor',
  menubar: false,
  statusbar: false,
  plugins: ["link", "paste"],
  toolbar: [
      {
        name: 'formatting', items: [ 'bold', 'italic', 'underline', 'link']
      }
  ],
  height: 120,
  invalid_styles: 'color font-size font-family background background-image',
  paste_enable_default_filters: false,
  paste_filter_drop: false,
  paste_preprocess: function(plugin, args) {
    console.log(args.content);
    var newContent = args.content;
    newContent = newContent.replace(/<[^>]+>/g, '');
    args.content = newContent;
  }
}

$(document).ready(function() {
  $(document).foundation();

  $('body').on('dblclick', '.media-name', function(e) {
    e.preventDefault();
    var modalId = $(this).data('rename-modal');
    $.fancybox.open({
      src: modalId,
      type: 'ajax'
    })
  })

  setTimeout(function() {
    $('[data-children]').find('input[type="radio"], input[type="checkbox"], select').trigger('change');
  }, 1000);

  $('body').on('submit', '.add-media-form', function(e) {
    e.preventDefault();
    var $form = $(this);
    var action = $form.attr('action');
    var method = $form.attr('method');
    var data = $form.serialize();

    $.ajax({
      url: action,
      method: method,
      data: data
    }).done(function(response) {
      $('#media_gallery_table_' + response.table_target).html(response.view);
      $.fancybox.close();
      initPlugins();
    })
  });

  $('body').on('submit', '.media-item-rename-form', function(e) {
    e.preventDefault();
    var $form = $(this);
    var action = $form.attr('action');
    var method = $form.attr('method');
    var data = $form.serialize();
    $.ajax({
      url: action,
      method: method,
      data: data,
      dataType: 'json'
    }).done(function(response) {

      $('#' + $form.data('row-id')).replaceWith(response.view);
      $('#' + $form.data('linked-id')).replaceWith(response.view);
      $.fancybox.close();
      initPlugins();
    })

  })

  $('body').on('change', '[data-children] input, [data-children] select', function(e) {
    var $parent = $(this).parents('[data-children]');
    var fieldId = $parent.data('field-id');

    $('[data-parent="' + fieldId + '"]').each(function(i, e) {
      var parentVal = $(e).data('parent-value');
      parentVal = String(parentVal);
      var originalParentVal = parentVal;
      if (parentVal.includes('|')) {
        parentVal = parentVal.split('|');
      } else {
        parentVal = [parentVal];
      }


      var $input = $parent.find('input[value="' + parentVal + '"]');
      var $select = $parent.find('select');

      var inputVals = $parent.find('input:checked').map(function() {
        return $(this).val();
      }).get();



      if (parentVal.includes($select.find('option:checked').val())) {
        $(e).addClass('parent-active');
        if ($(e).data('parent-required') !== undefined) {
          var childId = $(e).data('child-id');
          getRequiredField(childId);
        }
      } else {
        $(e).removeClass('parent-active');
        if ($(e).data('parent-required') !== undefined) {
          var childId = $(e).data('child-id');
          getNonRequiredField(childId);
        }
      }

      // if (parentVal.includes($input.val()) && ($input[0].checked == true || $input[0].selected == true)) {
      //   $(e).addClass('parent-active');
      //   if ($(e).data('parent-required') !== undefined) {
      //     var childId = $(e).data('child-id');
      //     getRequiredField(childId);
      //   }
      // } else if (parentVal == $input.val()) {
      //   $(e).removeClass('parent-active');
      //   if ($(e).data('parent-required') !== undefined) {
      //     var childId = $(e).data('child-id');
      //     getNonRequiredField(childId);
      //   }
      // }

      inputVals.forEach(function(x) {
        if (parentVal.includes(x)) {
          $(e).addClass('parent-active');
          console.log(e);
          // $('[data-parent="' + fieldId + '"][data-parent-value="' + originalParentVal + '"]').addClass('parent-active');
        } else {
          $(e).removeClass('parent-active')
        }
      })
    })
  });

  $('body').on('submit', '.name-media-form', function(e) {
    e.preventDefault();
    var $form = $(this);

    var action = $form.attr('action');
    var method = $form.attr('method');
    var data = $form.serialize();

    $.ajax({
      url: action,
      method: method,
      data: data,
    }).done(function(response) {
      $form.remove();
      $('#' + $form.data('table-target-id')).append(response.view);
    })
  });

  $('body').on('submit', '.admin-filter-form', function(e) {
    e.preventDefault();

    var $form = $(this);
    $form.addClass('is-loading');
    var action = $form.attr('action');
    var method = $form.attr('method');
    var data = $form.serialize();

    $.ajax({
      url: action,
      method: method,
      data: data,
    }).done(function(response) {
      $('.admin-filter-form-filters').html(response.filters);
      $('.admin-filter-form-table').html(response.results);
      $('.admin-filter-form-pagination').html(response.pagination);
      $('.admin-filter-form-pagination-info').html(response.paginationInfo);
      $('.admin-filter-form-thead').html(response.thead);
      $('#selected_message').addClass('hide');
      $('#selected_message').html(response.selectionMessage);
      history.pushState(response.new_url, '', response.new_url);
      initPlugins();
    })
  });

  $('body').on('click', '[data-clear]', function(e) {
    var what = $(this).data('clear');
    var boxes = document.querySelectorAll('input[name="' + what + '[]"]');
    console.log(boxes);
    boxes.forEach(function(e) {
      e.checked = false;
    });
    $('.admin-filter-form').submit();
  });

  $('body').on('click', '[data-orderby]', function(e) {
    e.preventDefault();
    var what = $(this).data('orderby');
    var order = $(this).data('order');
    $('.admin-filter-form-orderby').val(what);
    $('.admin-filter-form-order').val(order);
    $('.admin-filter-form').submit();
  })

  if ($('.drag-and-drop-orderable').length > 0) {
    $('.drag-and-drop-orderable').tableDnD({
      onDragClass: 'is-active',
      dragHandle: '.draggable-row',
      onDrop: function(t, r) {
        $(t).find('tr').not('.head-row').each(function(i, e) {
          $(e).find('input.resource-order').val(i);
        });

        $(t).parents('form.orderable-form').submit();
      }
    })
  }

  checkboxesChanging = false;

  $('body').on('change', '.record-selection-checkbox', function(e) {
    var $checkbox = $(this);

    if (!checkboxesChanging) {
      checkboxesChanging = true;
      changeRecordCheckbox($checkbox).then(function() {
        checkboxesChanging = false;
      });
    }

  });

  $('body').on('change', '.record-select-all-checkbox', function(e) {
    var $checkbox = $(this);
    var type = $checkbox.data('type');

    if (!checkboxesChanging) {
      checkboxesChanging = true;
      changeSelectAll($checkbox).then(function() {
        checkboxesChanging = false;
      });
    }

  });

  $('body').on('submit', '#selection_form', function(e) {
    e.preventDefault();
    getSelectionMessage()
  });

  $('body').on('click', '.status-update-submit', function(e) {
    e.preventDefault();
    var $recordRow = $(this).parents('.record-row');
    $recordRow.addClass('is-loading');

    var $form = $recordRow.find('.status-update-form');
    var url = $form.attr('action');
    var method = $form.attr('method');
    var data = $form.serialize();

    $.ajax({
      url: url,
      data: data,
      method: method,
      dataType: 'JSON',
    }).done(function(response) {
      $recordRow.replaceWith(response.view);
      initPlugins();
    })
  })

  $('body').on('change', '.color-picker-radio', function() {
    $('.dropdown-pane').foundation('close');
    var color = $(this).val();

    $('.color-picker').removeClass(function (index, css) {
       return (css.match(/(^|\s)color-picker--\S+/g) || []).join(' ');
    });
    $('.color-picker').addClass('color-picker--' + color);
  });

  $('body').on('submit', '.orderable-form', function(e) {
    e.preventDefault();
    var $form = $(this);
    var url = $form.attr('action');
    var method = $form.attr('method');
    var data = $form.serialize();

    $.ajax({
      url: url,
      data: data,
      method: method,
      dataType: 'JSON',
    }).done(function(response) {
      console.log(response);
    })

  })

  if ($('.message').length > 0) {
    setTimeout(function() {
      $('.message').fadeOut(250);
    }, 12000)
  }



  $('body').on('click', '.add-something-button', function() {
    var what = $(this).data('add');
    var $form = $('.add-' + what + '-form');
    var action = $form.attr('action');
    var method = $form.attr('method');
    var data = $form.serialize();
    $.ajax({
      url: action,
      method: method,
      data: data,
    }).done(function(response) {
      $('#' + what + '_tbody').append(response.view);
      if (response.modals) {
        $('.' + what + '-upload-modal-area').append(response.modals);
      }

      var $count = $form.find('input[name="count"]');
      $count.val(parseInt($count.val()) + 1);
      initPlugins();
    })
  });

  // $('#add_curriculum_section').click(function() {
  //   var $form = $('.add-section-form');
  //   var action = $form.attr('action');
  //   var method = $form.attr('method');
  //   var data = $form.serialize();

  //   $.ajax({
  //     url: action,
  //     method: method,
  //     data: data,
  //   }).done(function(response) {
  //     $('#curriculum_section_tbody').append(response.view);
  //     $('.section-upload-modal-area').append(response.modals);
  //     var $count = $form.find('input[name="count"]');
  //     $count.val(parseInt($count.val()) + 1);
  //     initPlugins();
  //   })
  // });


  initPlugins();

  $('body').on('change', '.section-title-input', function(e) {
    var $input = $(this);
    var $titleText = $('#' + $input.data('title-text'));
    if ($input.val().length > 0) {
      $titleText.html($input.val());
    } else {
      $titleText.html('Untitled Section');
    }

  })

  $('body').on('click', '.remove-section', function(e) {
    e.preventDefault();
    var count = $(this).data('section-count');

    $('#section_row_' + count).remove();
    $('#section_media_' + count).remove();
  });

  $('body').on('click', '.remove-row', function(e) {
    e.preventDefault();
    var row = $(this).data('row-id');
    $('#' + row).remove();
  })

  $('body').on('click', '.done-editing-button', function() {
    $.fancybox.close();
  })

});

function initPlugins() {
  $('.select2-material').select2({
    theme: 'material',
    minimumResultsForSearch: -1
  });

  $('.select2-material-search').select2({
    theme: 'material',
  });

  $('.select2-tags').select2({
    theme: 'foundation',
    tags: true,
    placeholder: 'Click here to start tagging'
  })

  $('.editor').tinymce(tinymceConfig);
  $('.simple-editor').tinymce(tinymceConfigSimple);

  // $('.editor').tinymce(tinymceConfig);

  $('[data-fancybox]').fancybox({
    buttons: [
      'fullScreen',
      'close'
    ],
    animationEffect: 'zoom',
    touch: false,
    trapFocus: false,
    beforeShow: function() {
      var params = {};
      var parser = document.createElement('a');
      parser.href = this.src;
      var query = parser.search.substring(1);
      var vars = query.split('&');
      for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split('=');
        params[pair[0]] = decodeURIComponent(pair[1]);
      }
      var selected = '';
      if (params.table_target) {
        $('#media_gallery_table_' + params.table_target).find('input').each(function(i, e) {
          console.log(e)
          selected += $(e).val() + ',';
        });

        selected = selected.replace(/,+$/,'');

        this.src = this.src + '&selected=' + selected;
      }

    },
    afterShow: function() {
      if(tinymce.editors.length > 0) {
        tinymce.EditorManager.remove();
      }
      $(document).foundation();
      tinymce.init(tinymceConfig);
      tinymce.init(tinymceConfigSimple);
      $('[data-children] input').trigger('change')
      initPlugins();
    },
    afterClose: function() {
            $('.dropzone').each(function(i, e) {
                var $form = $(this);
                var maxFiles = $form.data('max-files');
                dz_name = 'dropzone_' + $form.data('field-name') + '_media_upload';
                if (Dropzone[dz_name]) {
                  Dropzone[dz_name].destroy();
                  delete Dropzone[dz_name];
                }
              });
    }
  })


  $('.dropzone').each(function(i, e) {
    var $form = $(this);
    var maxFiles = $form.data('max-files');
    dz_name = 'dropzone_' + $form.data('field-name') + '_media_upload';
    if (Dropzone[dz_name]) {
      Dropzone[dz_name].destroy();
    }

    // if (!Dropzone[dz_name]) {
      Dropzone[dz_name] = new Dropzone($form[0], {
        maxFiles: maxFiles,
        success: function (id, response) {
          $('#' + $form.data('field-name') + '_upload_list').after(response.view);
          this.removeFile(id)
          this.options.maxFiles = this.options.maxFiles - 1;
          if (this.options.maxFiles == 0) {
            this.disable();
            document.querySelector('#' + $form.data('field-name') + '_media_upload').classList.add('disabled');
          }
        },
        error: function(response) {
          var errorMessages = '';
          console.log(response);
          if (response.status == 'error') {
            errorMessages += '<h2 class="errors">There was an error. One or more of your files could not be uploaded. Other files have been successfully uploaded, but if you do not see one of your files below, it may have not met requirements or exceeded max file limits.</h2>';
          }
          $('#' + $form.data('field-name') + '_file_upload_errors').html(errorMessages);
          this.removeFile(response)
        }
      })
    // }

  });


  if ($('.drag-and-drop').length > 0) {
    $('.drag-and-drop').tableDnD({
      onDragClass: 'is-active',
      onDrop: function(t, r) {

        if ($(r).find('.editor').length > 0) {
          $(r).find('.editor').each(function(i, e) {
            $(e).tinymce().remove();
          });
          $(r).find('.editor').tinymce(tinymceConfig);
        }

        if ($(r).find('.simple-editor').length > 0) {
          $(r).find('.simple-editor').tinymce().remove();
          $(r).find('.simple-editor').tinymce(tinymceConfigSimple);
        }
      }
    });
  }
  $(document).foundation();
}

function changeRecordCheckbox($checkbox) {
  return new Promise(function(resolve, reject) {
    var type = $checkbox.data('type');
    var $selectAllCheckbox = $('.record-select-all-checkbox');
    if ($checkbox.prop('checked') == true) {
      if ($('.record-selection-checkbox').not(':checked').length < 1) {
        $selectAllCheckbox.prop('indeterminate', false);
        $selectAllCheckbox.prop('checked', true);
        getSelectionMessage();
      } else if ($('.record-selection-checkbox:checked').length > 0) {
        $selectAllCheckbox.prop('indeterminate', true);
        $selectAllCheckbox.prop('checked', false);
        $('#selected_message').addClass("hide");
        $('input[name="currently_selected"]').val('none');
      } else {
        $selectAllCheckbox.prop('indeterminate', false);
        $selectAllCheckbox.prop('checked', false);
      }
    } else {

      if ($('.record-selection-checkbox:checked').length > 0) {
        $selectAllCheckbox.prop('indeterminate', true);
        $('#selected_message').addClass("hide");
        $('input[name="currently_selected"]').val('none');
        $selectAllCheckbox.prop('checked', false);
      } else {
        $selectAllCheckbox.prop('indeterminate', false);
        $selectAllCheckbox.prop('checked', false);
      }
    }

    setSelection();

    resolve();
  })
}

function changeSelectAll($checkbox) {
  return new Promise(function(resolve, reject) {
    if ($checkbox.prop('checked') == true) {
      $('.record-selection-checkbox').prop('checked', true);
      setSelection();
      getSelectionMessage();
    } else {
      $checkbox.prop('indeterminate', false);
      $('.record-selection-checkbox').prop('checked', false);
      $('#selected_message').addClass("hide");
      $('input[name="currently_selected"]').val('none');
      setSelection();
    }
    resolve();
  });
}

function setSelection() {
  var selectedValues = '';
  $('.record-selection-checkbox:checked').each(function() {
    selectedValues += ',' + $(this).val();
  })
  selectedValues = selectedValues.replace(/(^,)|(,$)/g, "");
  $('input[name="selection"]').val(selectedValues);

  if (selectedValues.length > 0) {
    $('.bulk-actions-select').attr('disabled', false);
  } else {
    $('.bulk-actions-select').attr('disabled', true);
  }

}

selectionSending = false;

function getSelectionMessage() {
  if (!selectionSending) {
    selectionSending = true;
    $form = $('#selection_form');
    var action = $form.attr('action');
    var method = $form.attr('method');
    var data = $form.serialize();

    $.ajax({
      url: action,
      method: method,
      data: data
    }).done(function(response) {
      selectionSending = false;
      $('#selected_message').html(response.view);
      if (response.show) {
        $('#selected_message').removeClass('hide');
      } else {
        $('#selected_message').addClass('hide');
        $('.record-select-all-checkbox').prop('checked', false).trigger('change');
        $('input[name="selection"]').val('');
      }

      if (response.selection) {
        $('input[name="selection"]').val(response.selection);
      }
    })
  }
}

function cancelAllMediaNames() {
  return new Promise(function(resolve, reject) {
    $('.media-item-row.editing').each(function(e, i) {
      var $row = $(this);
      var mediaId = $row.data('media-id');

      $.ajax({
        method: 'GET',
        url: '/admin/media/' + mediaId + '/quick-edit/cancel'
      }).done(function(response) {
        $row.replaceWith(response.view);
      })

    })
    resolve();
  })
}
