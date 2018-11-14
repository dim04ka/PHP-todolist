
function showWindow(id) {
    if (typeof id != 'undefined') {
        $.ajax({
            dataType: 'json',
            url: '?option=view&id_text='+id,
            success: function (data) { 
                $('#add_ticket').find('[name=id]').val(id);
                $('#add_ticket').find('[name=title]').val(data.title);
                $('#add_ticket').find('[name=disc]').val(data.disc);
                $('#add_ticket').find('[name=cat]').val(data.inwork);
                $('#comments').html(data.comments);

                var btn = document.getElementById('zatemnenie');
                btn.style.display = "block";
            }
        });
    }
    else {
        $('#add_ticket').find('[name=id]').val('0');
        $('#add_ticket').find('[name=title]').val('');
        $('#add_ticket').find('[name=disc]').val('');
        $('#add_ticket').find('[name=cat]').val('');
        $('#comments').empty();
        var btn = document.getElementById('zatemnenie');
        btn.style.display = "block";
    }
    return false;
    
}
function hideWindow() {
    var btn = document.getElementById('zatemnenie');
    btn.style.display = "none";
}

function comment_add(id) {

    var comment = $('#comments').find('[name=text_comment]').val();
    $.ajax({
        dataType: 'json',
        method: "POST",
        url: '?option=comments&action=addComment',
        data:{ 
            id_text: id,
            comment: comment 
        },

        success: function (data) { 
            $('#comments').html(data.comments);
        }
    });
    return false;
}
