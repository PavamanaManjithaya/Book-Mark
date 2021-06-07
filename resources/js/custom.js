let axios=require('axios');

$('body').on('click','.delete-bookmark',function(){
   let id= $(this).data('id');
    console.log(id);
    //alert(1);
    axios.delete('/bookmarks/'+id)
    .then(function(){
        window.location.reload();
    }).catch(function (error) {
        console.log(error);
    });
});