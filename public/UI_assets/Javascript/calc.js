function calcDisc(){

    if (document.getElementById('fee').value !== undefined) {

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
}


function calcAdmissionFee(){

    if (document.getElementById('received').value !== undefined) {

        var r = document.getElementById('received').value;
        var p = document.getElementById('previous').value;
        var e = document.getElementById('est').value;

        var c = 0;
        c = parseInt(r) + parseInt(p) - parseInt(e);

        document.getElementById('change').value = c;

    }

}


function calcAppointmentFee(){

    if (document.getElementById('r2').value !== undefined) {

        var r2 = document.getElementById('r2').value;
        var e2 = document.getElementById('estimate').value;

        var c2 = r2 - e2;

        document.getElementById('c2').value = c2;

    }

}


