$(document).ready(function(){


    window.getPage = function(e){
        e.preventDefault();
        console.log('proba');
        var page = e.target.getAttribute('href').split('page=')[1];
        fetch_data(page);
    }

    window.fetch_data = function(page){
        $.ajax({
            url:"/superadmin/job-titles/paginated?page="+page,
            success:function(data)
            {
                console.log(data);
                // $('#table_data').html(data);
            }
        });
    }

});
