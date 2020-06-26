$(document).ready(function(){


    window.getPage = function(e){
        e.preventDefault(); 
        var page = e.target.attr('href').split('page=')[1];
        fetch_data(page);
    }

    window.fetch_data =function(page){
        $.ajax({
            url:"/pagination/fetch_data?page="+page,
            success:function(data)
            {
                $('#table_data').html(data);
            }
        });
    }

});