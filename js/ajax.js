// !Finished_Yet

// console.log('Hellow World');

// Ambil elemen-elemen yg dibutuhkan di DOM
var keyword = document.getElementById('keyword');
// var submit = document.getElementById('submit');
var container = document.getElementById('container');
var page = document.getElementsByClassName('page');
var previous = document.getElementById('previous');
var next = document.getElementById('next');
var total = document.getElementById('total');

var hal = 1;

hide();

// submit.addEventListener('mouseover', function () {
//     alert("Berhasil");
// });
// submit.addEventListener('click', function () {
//     alert("Berhasil");
// });
// submit.addEventListener('dblclick', function () {
//     alert("Berhasil");
// });

// keyword.addEventListener('keypress', function () {
//     alert("Berhasil");
// });

function hide() {
    if (hal == total.value) {
        next.style.visibility = "hidden";
    } else {
        next.style.visibility = "visible";
    }

    if (hal == 1) {
        previous.style.visibility = "hidden";
    } else {
        previous.style.visibility = "visible";
    }
}

keyword.addEventListener('keyup', function () {
    // alert("Berhasil");
    // console.log(keyword.value);

    // Buat object ajax
    var xhr = new XMLHttpRequest();

    // Cek kesiapan ajax
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            container.innerHTML = xhr.responseText;
        }
    }

    // Eksekusi ajax
    xhr.open('GET', 'src/komik.php?keyword=' + keyword.value, true);
    xhr.send();

    hal = 1;

    hide();
});

for (var i = 0; i < page.length; i++) {
    page[i].addEventListener('click', function (event) {
        event.preventDefault()

        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                container.innerHTML = xhr.responseText;
            }
        }

        xhr.open('GET', 'src/komik.php?keyword=' + keyword.value + '&page=' + this.getAttribute('page'), true);
        xhr.send();

        hal = Number(this.getAttribute('page'));

        hide();
    });
}

if (previous) {
    previous.addEventListener('click', function (event) {
        event.preventDefault()

        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                container.innerHTML = xhr.responseText;
            }
        }

        hal = hal - 1;

        xhr.open('GET', 'src/komik.php?keyword=' + keyword.value + '&page=' + hal, true);
        xhr.send();

        hide();
    });
}

if (next) {
    next.addEventListener('click', function (event) {
        event.preventDefault()

        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                container.innerHTML = xhr.responseText;
            }
        }

        hal = hal + 1;

        xhr.open('GET', 'src/komik.php?keyword=' + keyword.value + '&page=' + hal, true);
        xhr.send();

        hide();
    });
}