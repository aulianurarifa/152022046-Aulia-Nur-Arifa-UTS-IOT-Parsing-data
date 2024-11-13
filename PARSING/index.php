<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Display</title>
    <style>
        /* Body styling */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f8fa;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        /* General container styling */
        .container {
            width: 80%;
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Title Styling */
        h2 {
            text-align: center;
            color: #0056b3;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        /* Card styling */
        .card {
            display: flex;
            justify-content: space-between;
            background-color: #ffffff;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            margin: 0;
            color: #333;
        }

        .card p {
            font-size: 1.2rem;
            color: #555;
        }

        /* Tabel styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #0056b3;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e1f0ff;
        }

        /* Responsive Table Styling */
        @media (max-width: 768px) {
            table {
                font-size: 0.9rem;
            }

            .card {
                flex-direction: column;
                align-items: center;
            }
        }

        /* Button styling for interactivity */
        .btn {
            padding: 10px 20px;
            background-color: #0056b3;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1rem;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #003f7f;
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    // Memuat dan mengurai (decode) data JSON dari file
    $jsonData = file_get_contents('data.json');
    $data = json_decode($jsonData, true);
    ?>

    <!-- Data Ringkasan Card -->
    <div class="card">
        <div>
            <h3>Suhu Maksimum</h3>
            <p><?= $data["suhumax"] ?> °C</p>
        </div>
        <div>
            <h3>Suhu Minimum</h3>
            <p><?= $data["suhumin"] ?> °C</p>
        </div>
        <div>
            <h3>Suhu Rata-Rata</h3>
            <p><?= $data["suhu_rata"] ?> °C</p>
        </div>
    </div>

    <!-- Hasil Suhu Max & Humidity Max -->
    <h2>Hasil Suhu Max & Humidity Max</h2>
    <table>
        <tr>
            <th>Indeks</th>
            <th>Suhu</th>
            <th>Humidity</th>
            <th>Kecerahan</th>
            <th>Timestamp</th>
        </tr>
        <?php foreach ($data["hasil_suhu_max_humid_max"] as $record) : ?>
            <tr>
                <td><?= $record["idx"] ?></td>
                <td><?= $record["suhum"] ?> °C</td>
                <td><?= $record["humid"] ?> %</td>
                <td><?= $record["kecerahan"] ?></td>
                <td><?= $record["timestamp"] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- Month-Year Max Humidity -->
    <h2>Humidity Tertinggi per Bulan-Tahun</h2>
    <table>
        <tr>
            <th>Bulan-Tahun</th>
            <th>Humidity</th>
        </tr>
        <?php foreach ($data["month_year_max"] as $entry) : ?>
            <tr>
                <td><?= $entry["month_year"] ?></td>
                <td><?= isset($entry["humid"]) ? $entry["humid"] : "N/A" ?> %</td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- Button -->
    <div style="text-align: center;">
        <button class="btn" onclick="window.location.reload()">Refresh Data</button>
    </div>
</div>

</body>
</html>
