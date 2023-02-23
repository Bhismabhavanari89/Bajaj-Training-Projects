function changeimage(image, number,color,cdid){


    document.getElementById('big-img').src=image;
    
    document.getElementById('number').innerText = number;
    let url = document.getElementById('booking').href;
    let urlup = url.replace(url.split("?")[1],`cid=${cdid}`);
    document.getElementById('booking').href = urlup;
}

function calculatePrice(price,discount){
    let start_date = document.getElementById('start_date').value;
    let end_date = document.getElementById('end_date').value;
    // console.log(new Date(end_date)-new Date(start_date));
    if(start_date != ""){
        let days = Math.floor((Date.parse(end_date) - Date.parse(start_date))/86400000);
        if(days==0){
            days = 1;
        }
        let finalamount = price*days;
        let discamount = (discount/100)*finalamount;
        finalamount = finalamount-discamount;
        // document.write(finalamount);
        document.getElementById("price").innerHTML = finalamount;
    }
    else{
        alert("Please enter start date");
    }
}

function calculate(price,prevenddate){
    let start_date = document.getElementById('start_date').value;
    let end_date = document.getElementById('end_date').value;
    // console.log(new Date(end_date)-new Date(start_date));
    if(start_date != ""){
        let prevdays = Math.floor((Date.parse(prevenddate) - Date.parse(start_date))/86400000);
        let days = Math.floor((Date.parse(end_date) - Date.parse(start_date))/86400000);
        if(days==0){
            days = 1;
        }
        let finalamount = price/prevdays;
        //let discamount = (discount/100)*finalamount;
        finalamount = finalamount*days;
        // document.write(finalamount);
        // let final = "After Update: ".concat(finalamount);
        document.getElementById("price").innerHTML = finalamount;
    }
    else{
        alert("Please enter start date");
    }
}

function deletebooking(){
    alert("Do you really want to delete");
}