function validateForm(){
    var flag = true;
    var message = '';
    var title = document.getElementById('title').value;
    var text = document.getElementById('text').value;
    if(title.trim() == '' || title.trim() == 'nbsp;' || title.trim() == undefined){
        message = "Title is empty";
        flag = false;
    }else if(text.trim() == '' || text.trim() == 'nbsp;' || text.trim() == undefined){
        message = "Text is empty";
        flag = false;
    }
    if(flag == false){
        alert(message);
    }
    return flag;
}