function validate(obj) {
    if(!obj.checkValidity()) {
    //alert("You have invalid input. Correct it!");
    $(obj).css('border-color', 'red')
    //obj.focus();
    } else {
    $(obj).css('border-color', '')
    }
}