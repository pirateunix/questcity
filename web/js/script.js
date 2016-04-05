function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} 

jQuery(document).ready(function(){
    $(".qu-schedule-table-cell__active").hover(
        function(){
            $('.price', this).css('visibility','visible');
        },
        function(){
	    $('.price', this).css('visibility','hidden');
       });
    $(".qu-schedule-table-cell__active").click(function() {
        var data = {};
        var $that = $(this);
        $.get('/schedule/buildForm', {
            time : $that.data('time'),
            quest : $that.data('quest')
        })
            .done(function(content){
                var $elem = $('<div title="Забронировать время"/>');
                $elem.html(content);
                $elem.dialog({
                    width:320
                });
                $elem.find('#send').click(function(){
		    var email = $('input[name="schedule[email]"]').val();
     	    if (email != '' && !validateEmail(email)) {

			alert('Не верно введен Email');
			return false;
		    }
		    var name = $('input[name="schedule[name]"]').val();
		    var phone = $('input[name="schedule[phone]"]').val();
		    if (name == '' || name.length < 3) {
			alert('Введите имя' + name);
			return false;
		    }
                    if (phone == '' || phone.length < 7) {
                        alert('Введите верный телефон');
                        return false;
                    } 
                    var formData = $('form[name=schedule]').serialize();
                    //alert(formData);
                    $.post('/schedule/buildForm', formData).done(function() {
                        $elem.dialog('close');
                        $('.qu-schedule-table-time',$that).addClass('qu-schedule-table-time__hidden');
                        $that.data('booked', true);
			            window.location = '/schedule/?success=1';
                    });
                })
            });
    });


    $("._article_edit").click(function(){
        var key = $(this).data('key');
        window.location.href = '/vilmins/articles/edit/' + key;
    });

    $("._article_delete").click(function(){
        var key = $(this).data('key');
        window.location.href = '/vilmins/articles/delete/' + key;
    });
    $("._article_add").click(function(){
        window.location.href = '/vilmins/articles/add/';
    });

    $("._article_cancel").click(function(){
        window.location.href = '/vilmins/articles/';
    });

    $("._quest_edit").click(function(){
        var name = $(this).data('name');
        window.location.href = '/vilmins/quest/edit/' + name + '/';
    });

    $("._quest_delete").click(function(){
        var name = $(this).data('name');
        window.location.href = '/vilmins/quest/delete/' + name + '/';
    });
    $("._quest_add").click(function(){
        window.location.href = '/vilmins/quest/add/';
    });
    $("._quest_cancel").click(function(){
        window.location.href = '/vilmins/quest/';
    });


    $("._schedule_confirm").click(function(){
        var name = $(this).data('id');
        window.location.href = '/vilmins/schedule/confirm/' + name + '/';
    });
    $("._schedule_reject").click(function(){
        var name = $(this).data('id');
        window.location.href = '/vilmins/schedule/reject/' + name + '/';
    });
});
