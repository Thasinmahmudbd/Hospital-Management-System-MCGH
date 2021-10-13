function calcDisc(){
    var disc = document.getElementById('disc').value;
    var fee = document.getElementById('fee').value;

    var saving = (disc/100)*fee;
    var payable = fee - saving;

    var remainder = payable % 10;
    var bill = payable - remainder;

    if(remainder>3 && remainder<=7){
        bill += 5;
    }

    else if(remainder>7){
        bill += 10;
    }

    document.getElementById('estimate').value = bill;
    }


