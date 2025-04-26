<?php
if (!isset($_SESSION)) {
    session_start();
}
include "auth.php";
include "header_voter.php";
?>
<center><h3> Last Election Result </h3></center>
<?php
include "connection.php";
$member = mysqli_query($con, 'SELECT * FROM languages');

if (mysqli_num_rows($member) == 0) {
    echo '<font color="red">No results found</font>';
} else {
    // Initialize variables to track the winner
    $maxVotes = 0;
    $winnerName = '';

    // Start the table
    echo '<center><table><tr bgcolor="#FF6600">
    <td width="30px">ID</td>		
    <td width="100px">LANGUAGE</td>
    <td width="100px">ABOUT</td>
    <td width="30px">VOTE</td>
    </tr>';

    // Loop through the results
    while ($mb = mysqli_fetch_object($member)) {
        $id = $mb->lan_id;
        $name = $mb->fullname;
        $about = $mb->about;
        $vote = $mb->votecount;

        // Check if this language has the highest votes
        if ($vote > $maxVotes) {
            $maxVotes = $vote;
            $winnerName = $name;
        }

        // Display the row
        echo '<tr bgcolor="#BBBEFF">';
        echo '<td>' . $id . '</td>';
        echo '<td>' . $name . '</td>';
        echo '<td>' . $about . '</td>';
        echo '<td>' . $vote . '</td>';
        echo "</tr>";
    }

    // Close the table
    echo '</table></center>';

    // Display the winner
    if (!empty($winnerName)) {
        echo '<center><h3 style="color: green;">Winner : ' . $winnerName . ' with ' . $maxVotes . ' votes!</h3></center>';
    }
}
?>