class GeneralService {

    showLoader(){
        let tmp = document.getElementById("loader");
        if(tmp!=null){
            tmp.style.display = "block";
        }
    }
    hideLoader(){
        let tmp = document.getElementById("loader");
        if(tmp!=null){
            tmp.style.display = "none";
        }
    }
}

export default new GeneralService();