function dangxuat(){
    var x = confirm("Bạn có chắc chắn muốn đăng xuất?");
    if(x){
        return true;
    }else{
        return false;
    }
}
function myFunction(){
    document.querySelectorAll("input[type=submit]")[0].click();
}
function confirm_delete(){
            var x= confirm("Bạn có chắc xóa đề xuất này không?");
            if(x){
                return true;
            }
            else{
                return false;
            }
        }