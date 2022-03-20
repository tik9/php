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

tableCreate();

setTimeout(() => {
    console.log(3)

}, 500);

console.log(2)
