$(function (){
    $('#enroll').on(
        'click',
        function(event){event.preventDefault();

        const uname =$('#uname').val();
        console.log(uname);
        const lc =$('#lc').val();
        console.log(lc);

        $.ajax({
            type: 'POST',
            url: 'src/insert_db.php',
            data: {
                'uname' : uname,
                'lc' : lc 
            }
        });
        location.reload();
        }
        )
})