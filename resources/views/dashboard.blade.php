<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard</title>
</head>

<body class="font-sans">
    <h1>Data di Database</h1>
    <table id="table-devices" class=" table-auto border border-spacing-10">
        <thead>
            <tr>
                <th class="border border-slate-600">id</th>
                <th class="border border-slate-600">Nama device</th>
                <th class="border border-slate-600">Nilai Min</th>
                <th class="border border-slate-600">Nilai Max</th>
                <th class="border border-slate-600">Nilai</th>
                <th class="border border-slate-600">Created at</th>
                <th class="border border-slate-600">Updated at</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <script>
        function getDevicesData() {
            return fetch('http://localhost:8000/api/devices')
                .then(response => response.json())
                .then(json => json)
        }

        function fillNewRow() {

            getDevicesData().then(data => {
                const tableBody = document.getElementById('table-devices').getElementsByTagName('tbody')[0]

                data.forEach(element => {
                    // each element is a literal object
                    const newRow = document.createElement('tr')
                    for (key in element) {
                        const newEntry = document.createElement('td')
                        newEntry.textContent = element[key]
                        newEntry.classList.add('border')
                        newRow.appendChild(newEntry)
                    }
                    tableBody.appendChild(newRow)
                });

            })

        }

        fillNewRow()

        setInterval(() => {
            location.reload()
        }, 2000);
    </script>
</body>

</html>
