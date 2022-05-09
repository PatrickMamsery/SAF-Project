function addLike(user_id, photo_id) {
  //console.log(photo_id);
    var url = '/user/addLike/';
        var form = `${'<form action="' + url + '" method="post">' +
          '<input type="number" name="user_id" value="'+user_id+'" />' +
          '<input type="text" name="photo_id" value="'+photo_id+'" />' + 
          '{{ csrf_field() }}'+       
          '</form>'}`;
        $('body').append(form);
        console.log(form);
        // form.submit();
        // form.trigger("submit");
}