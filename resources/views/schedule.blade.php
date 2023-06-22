<!DOCTYPE html>
<html>
<head>
    <title>Tournament Schedule</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
            color: #333;
        }

        .container {
            margin-top: 50px;
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .team-list {
            list-style-type: none;
            padding-left: 0;
        }

        .team-list li {
            margin-bottom: 5px;
        }

        .stage-heading {
            margin-top: 30px;
            font-size: 24px;
            font-weight: bold;
        }

        .match-table th {
            text-align: center;
        }

        .winner {
            font-weight: bold;
        }
        .fadeIn {
            animation: fadeIn 0.5s;
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        .zoomIn {
            animation: zoomIn 0.5s;
        }

        @keyframes zoomIn {
            0% { transform: scale(0.8); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }
    </style>

    <script>

        $(document).ready(function() {
            $('.match-table').DataTable();
        });

         $(window).on('load', function() {
            $('.team-list').addClass('zoomIn');
        });
    </script>
</head>
<body>
    <div class="container">
        <h1>Tournament Schedule</h1>
        <div class="row">
            <div class="col-md-6" style="text-align:center">
                <h2>Group A Teams</h2>
                <ul class="team-list">
                    @foreach ($groupA as $team)
                        <li>{{ $team }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-6" style="text-align:center">
                <h2>Group B Teams</h2>
                <ul class="team-list">
                    @foreach ($groupB as $team)
                        <li>{{ $team }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <h2 class="stage-heading">League Matches</h2>
        <table class="table match-table">
            <thead>
                <tr>
                    <th>Team 1</th>
                    <th>Team 2</th>
                    <th>Winner</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leagueMatches as $match)
                    <tr>
                        <td>{{ $match['team1'] }}</td>
                        <td>{{ $match['team2'] }}</td>
                        <td>{{ $match['winner'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2 class="stage-heading">Tournament Results</h2>
        <table class="table match-table">
            <thead>
                <tr>
                    <th>Stage</th>
                    <th>Team 1</th>
                    <th>Team 2</th>
                    <th>Winner</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tournamentResults as $result)
                    <tr>
                        <td>{{ $result['stage'] }}</td>
                        <td>{{ $result['team1'] }}</td>
                        <td>{{ $result['team2'] }}</td>
                        <td class="winner">{{ $result['winner'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
