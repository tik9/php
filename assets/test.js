var testdiv = document.getElementById('test')

function tableCreate() {
    const tbl = document.createElement('table');
    tbl.classList.add('table', 'table-striped')

    for (let i = 0; i < 3; i++) {
        const tr = tbl.insertRow();
        for (let j = 0; j < 2; j++) {
            const td = tr.insertCell();
            td.appendChild(document.createTextNode(`Cell I${i}/J${j}`));
            td.style.border = '1px solid black';

        }
    }
    testdiv.appendChild(tbl);
}

// tableCreate();

function fetch_test() {
    // var url = 'http://192.168.178.23:3000/showdir/gpx'
    var url = 'server.php'
    fetch(url).then(res => res.json()).then(data => console.log(1, data))
}

fetch_test()

console.log(2)