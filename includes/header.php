<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>List Game UAS</title>
    <link rel="stylesheet" href="/game_api_2411500047/assets/style.css">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f1f5f9;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .content {
            margin-left: 220px;
            padding: 30px;
        }

        h1, h2 {
            margin-top: 0;
            color: #1e293b;
        }

        /* CARD */
        .card {
            background: white;
            padding: 25px;
            border-radius: 8px;
            max-width: 900px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        /* FORM */
        .form-row {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
        }

        .form-group {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 14px;
            margin-bottom: 5px;
            color: #475569;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #cbd5f5;
            font-size: 14px;
        }

        /* BUTTON */
        .btn {
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1e40af;
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
        }

        table th {
            background: #1e293b;
            color: white;
            padding: 12px;
            text-align: left;
        }

        table td {
            padding: 12px;
            border-bottom: 1px solid #e2e8f0;
        }

        table tr:hover {
            background: #f8fafc;
        }
    </style>
</head>
<body>
