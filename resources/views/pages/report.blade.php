
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vote Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>

<div class="container">
    <br>
    <h1>DVOTE FINAL REPORT</h1>
    <table class="table">
        <tbody class="table-group-divider">
            <tr>
                <td></td>
            </tr>
        </tbody>
    </table>
    <br>
    <h3>Vote Details</h3>
    <table class="table table-striped-columns">
<thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">total</th>
    </tr>
</thead>
  <tbody class="table-group-divider">
    <tr>
      <td>Candidates</td>
      <td>{{ $totalcandidate }}</td>
    </tr>
    <tr>
      <td>Registered Voters</td>
      <td>{{ $totalvoter }}</td>
    </tr>
    <tr>
      <td>Voted User</td>
      <td>{{ $totalvote }}</td>
    </tr>
    <tr>
      <td>Not Voted User</td>
      <td>{{ $totalunvote }}</td>
    </tr>
  </tbody>
</table>
<br>
<br>
<h3>Candidate Points</h3>
<h5>Total Candidates: {{ $totalcandidate }}</h5>
<table class="table table-striped-columns">
    <thead>
        <tr>
            <th scope="col">Candidate Name</th>
            <th scope="col">Total points +1</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
         @foreach ($candidates as $candidate)
        <tr>
            <td>{{ $candidate->fname }} {{ $candidate->lname }}</td>
            <td>{{ $candidate->points }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>