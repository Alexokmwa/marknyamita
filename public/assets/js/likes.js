var post = {

    posting: false,
    liked_element: null,
    root: root,

    like: function(postID, ele) {
        post.liked_element = ele;

        let obj = {
            postID,
            data_type: 'like'
        };

        post.send_data(obj);
    },

    send_data: function(obj) {

        if (post.posting)
            return;

        let xhr = new XMLHttpRequest();
        post.posting = true;

        xhr.addEventListener('readystatechange', function() {

            if (xhr.readyState == 4) {
                post.posting = false;
                post.handle_result(xhr.responseText);
            }
        });

        let myform = new FormData();
        for (key in obj) {
            myform.append(key, obj[key]);
        }

        xhr.open('post', post.root+'Ajax');
            xhr.send(myform);
            },
            handle_result: function(result) {
            let obj = JSON.parse(result);
            if (obj.data_type == 'like') {
            let svg = post.liked_element.querySelector('svg');
            let color = obj.liked ? "#fd0dd8" : "#0d6efd";
            svg.setAttribute('fill', color);
            if (obj.likes == 0)
            obj.likes = "";

            post.liked_element.querySelector(".js-likes-count").innerHTML = obj.likes;
        }
        // added to relod page 
        // location.reload(); 
        // added end   
            }
}
