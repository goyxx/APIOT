function getDevicesData() {
    return fetch('http://localhost:8000/api/devices')
        .then(response => response.json())
        .then(json => json)
}

function fillNewRow() {

    getDevicesData().then(data => {
        const tableBody = document.getElementById('table-devices').getElementsByTagName('tbody')

        data.forEach(element => {
            console.log(element.id)
        });

    })

}

fillNewRow()
