function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
		$('.image-upload-wrap').addClass('image-dropping');
	});
	$('.image-upload-wrap').bind('dragleave', function () {
		$('.image-upload-wrap').removeClass('image-dropping');
});

function step_process(from, to, dir) {
    if (typeof(dir) === 'undefined') dir = 'asc';
    var old_move = '';
    var new_start = '';

    var speed = 500;

    if (dir == 'asc') {
        old_move = '-';
        new_start = '';
    } else if (dir == 'desc') {
        old_move = '';
        new_start = '-';
    }

    $('#block'+from).animate({left: old_move+'100%'}, speed, function() {
        $(this).css({left: '100%', 'background-color':'transparent', 'z-index':'2'}); 
    });
    $('#block'+to).css({'z-index': '3', left:new_start+'100%'}).animate({left: '0%'}, speed, function() {
        $(this).css({'z-index':'2'}); 
    });

    if (Math.abs(from-to) === 1) {
        // Next Step
        if (from < to) $("#step"+from).addClass('complete').removeClass('current');
        else $("#step"+from).removeClass('complete').removeClass('current');
        var width = (parseInt(to) - 1) * 20;
        $(".progress_bar").find('.current_steps').animate({'width': width+'%'}, speed, function() {
            $("#step"+to).removeClass('complete').addClass('current');
        });
    } else {
        // Move to Step
        var steps = Math.abs(from-to);
        var step_speed = speed / steps;
        if (from < to) {
            move_to_step(from, to, 'asc', step_speed);
        } else {
            move_to_step(from, to, 'desc', step_speed);
        }
    }
}
    
function move_to_step(step, end, dir, step_speed) {
    if (dir == 'asc') {
        $("#step"+step).addClass('complete').removeClass('current');
        var width = (parseInt(step+1) - 1) * 20;
        $(".progress_bar").find('.current_steps').animate({'width': width+'%'}, step_speed, function() {
            $("#step"+(step+1)).removeClass('complete').addClass('current');
            if (step+1 < end) move_to_step((step+1), end, dir, step_speed);
        });
    } else {
        $("#step"+step).removeClass('complete').removeClass('current');
        var width = (parseInt(step-1) - 1) * 20;
        $(".progress_bar").find('.current_steps').animate({'width': width+'%'}, step_speed, function() {
            $("#step"+(step-1)).removeClass('complete').addClass('current');
            if (step-1 > end) move_to_step((step-1), end, dir, step_speed);
        });
    }
}

$(document).ready(function() {
    $("body").on("click", ".progress_bar .step.complete", function() {
        var from = $(this).parent().find('.current').data('step');
        var to = $(this).data('step');
        var dir = "desc";
        if (from < to) dir = "asc";

        step_process(from, to, dir);
    });
});
/* Table */
var TableManager = function(tableId, rowTag) {
  var mgr = {};
  mgr.tableId = tableId;
  mgr.rowTag = rowTag;

  mgr.appendRow = function(obj) {
    var table = $("#" + mgr.tableId);
    var newRow = table.find("#" + mgr.tableId + "_template").clone();
    mgr.wireUpRow(newRow);
    mgr.setRowData(newRow, obj);
    table.append(newRow);
  }

  mgr.appendEmptyRow = function() {
    mgr.appendRow({
      name: null,
      value: null
    });
  }

  mgr.prependRow = function(obj) {
    var table = $("#" + mgr.tableId);
    var newRow = table.find("#" + mgr.tableId + "_template").clone();
    mgr.wireUpRow(newRow);
    mgr.setRowData(newRow, obj);
    table.prepend(newRow);
  }

  mgr.wireUpRow = function(row) {
    row.find('button[name="' + mgr.rowTag + '_add"]').click(function() {
      mgr.appendEmptyRow();
    });

    row.find('button[name="' + mgr.rowTag + '_delete"]').click(function(evt) {
      var table = $("#" + mgr.tableId);
      var numTableRows = table.find('tr[title="annotation"]').size();
      if (numTableRows > 1) {
        $(evt.target).parents('tr').remove();
      }
    });
  }

  mgr.getRowData = function(row) {
    var data = {};
    var prefix = mgr.rowTag + "_";
    $(row).find('input,select,textarea').each(function(index, element) {
      var name = $(element).attr('name');
      var bareName = name.slice(name.indexOf(prefix) + prefix.length);

      data[bareName] = $(element).val();
    });
    return data;
  }

  mgr.setRowData = function(row, obj) {
    Object.getOwnPropertyNames(obj).forEach(function(name, idx, array) {
      row.find('input[name="' + mgr.rowTag + '_' + name + '"]').val(obj[name]);
    });
  }

  var table = $("#" + mgr.tableId);
  mgr.wireUpRow(table.find("#" + mgr.tableId + "_template"));

  return mgr;
}

var AnnotationTableManager = new TableManager('annotations', 'annotation');

$(document).ready(function() {
  AnnotationTableManager.prependRow({
    "name": "Tissue",
    "value": "Lung"
  });
});

/*Tags*/



