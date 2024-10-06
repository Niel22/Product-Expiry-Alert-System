$(function() {
    $('.btn-todo-add').on('click', function () {
        let item = $('#TodoInput').val();
        if (item) {
            $('.todo-list').append(

                '<li>'+ '<span>' +
                    item + '</span>' +
                    '<div class="todo-action"><span class="btn done p-1 fa fa-check" onClick="toggleDone(this)"></span><span class="btn text-danger close p-1 fa fa-trash-o" onClick="toggleClose(this)"></span></div>' +
                '</li>'
                
            );
            $('input[type="text"]').val('')
            $('.todo-error').hide();
        } else {
            $('.todo-error').show();
        }
    });
    $('.todo-list .close').on('click', function () {
        toggleClose(this);
    });

    $('.todo-list .done').on('click', function () {
        toggleDone(this);
    });
    
});

function toggleHide() {
    $('.todo-list li').hide();
}

function toggleClose(ele) {
    $(ele).parent().parent().toggle();
}

function toggleDone(ele) {
    $(ele).parent().parent().toggleClass('active');
}