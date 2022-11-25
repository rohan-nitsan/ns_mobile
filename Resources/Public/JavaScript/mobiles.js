function filter(){
    var brand = document.getElementById('brand').value;
    var model = document.getElementById('model').value;
    var technology = document.getElementById('technology').value;
    data = new FormData();
    data.append('brand',brand);
    data.append('model',model);
    data.append('technology',technology);
    xhttp = new XMLHttpRequest()
    var url = document.getElementById('filterForm').getAttribute('action');
    xhttp.open("POST", url, true);
    var remove_div = document.getElementById('mobileData');
    if (remove_div) {
        remove_div.parentNode.removeChild(remove_div);
    }
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            var return_data = xhttp.responseText;
            document.getElementById('status').innerHTML = return_data;
        }
    }
    xhttp.send(data);
}

function pagination(pageNumber){
    
    xhttp = new XMLHttpRequest();
    var brand = document.getElementById('brand').value;
    var model = document.getElementById('model').value;
    var technology = document.getElementById('technology').value;
    data = new FormData();
    data.append('brand',brand);
    data.append('model',model);
    data.append('technology',technology);
    var url = document.getElementById('page'+pageNumber).getAttribute('action');
    xhttp.open("POST", url, true);
    var remove_div = document.getElementById('mobileData');
    if (remove_div) {
        remove_div.parentNode.removeChild(remove_div);
    }
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            var return_data = xhttp.responseText;
            document.getElementById('status').innerHTML = return_data;
        }
    }
    xhttp.send(data);
}

function getModelByBrand(){
    var model = document.getElementById('model').value;
    var brand = document.getElementById('brand').value;
    var technology = document.getElementById('technology').value;
    data = new FormData();
    data.append('brand',brand);
    data.append('model',model);
    data.append('technology',technology);
    xhttp = new XMLHttpRequest()
    var url = document.getElementById('filterForm').getAttribute('action');
    xhttp.open("POST", url, true);
    var remove_div = document.getElementById('mobileData');
    if (remove_div) {
        remove_div.parentNode.removeChild(remove_div);
    }
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            var return_data = xhttp.responseText;
            document.getElementById('status').innerHTML = return_data;
        }
    }
    xhttp.send(data);

}
document.getElementById("form"). addEventListener("click", function(event){
    event.preventDefault()
  });
function sendMail(mobileUid){
    var url = document.getElementById('form').getAttribute('action');
    data = new FormData();
    var fname = document.getElementById('fname').value
    var lname = document.getElementById('lname').value
    var email = document.getElementById('email').value
    var mobile = document.getElementById('mobile').value
    var message = document.getElementById('message').value
    var image = document.getElementById('productImage').getAttribute('src').substring(1);
    if(fname && lname && email && mobile && message != ''){
        data.append('fname',fname);
        data.append('lname',lname);
        data.append('email',email);
        data.append('mobile',mobile);
        data.append('message',message);
        data.append('imagePath',image)
        data.append('mobileUid',mobileUid)
        xhttp = new XMLHttpRequest()
        xhttp.open("POST", url, true);
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                xhttp.responseText;
            }
        }
        xhttp.send(data);
        alert('Inquiry Successfully Send');     
    }else{
        alert('Please Enter Valid Details');
    }
}
