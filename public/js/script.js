function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});

// Call the dataTables jQuery plugin
$(document).ready(function() {
    $('#dataTable').DataTable();
});

// Greetings
var today = new Date()
var curHr = today.getHours()

if (curHr >= 3 && curHr < 10) {
    document.getElementById("demo").innerHTML = 'Selamat Pagi';
} else if (curHr >= 10 && curHr <= 14) {
    document.getElementById("demo").innerHTML = 'Selamat Siang';
} else if (curHr >= 14 && curHr < 18) {
    document.getElementById("demo").innerHTML = 'Selamat Sore';
} else {
    document.getElementById("demo").innerHTML = 'Selamat Malam';
}

//Level

$(function() {
    $('#level').change(function() {
        $('.role').hide();
        $('#' + $(this).val()).show();
    });
});

//Level Chart
$(function() {
    $('.level').hide();
    $('#chart').change(function() {
        $('.level').hide();
        $('#' + $(this).val()).show();
    });
});

// Pay

function updateTotal() {
    var basic = 0;
    var add = 0;
    var form = document.getElementById('form');
    var checkboxes = form.getElementsByClassName('addon');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            add += 125000;
        }
    }
    var p = basic + add;
    var price = p;

    const format = price.toString().split('').reverse().join('');
    const convert = format.match(/\d{1,3}/g);
    const rupiah = 'Rp ' + convert.join('.').split('').reverse().join('')

    document.getElementById('total').value = rupiah;
}

document.getElementById('form').addEventListener('change', updateTotal);
// Run it once at startup
updateTotal();