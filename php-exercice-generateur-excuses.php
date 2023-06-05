<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Absence Excuse Form</title>
</head>

<body>
    <h1>Apology Letter Generator</h1>

    <form method="post" action="">
        <div class="childNamme"><label for="childName">Child's Name:</label>
            <input type="text" name="childName" id="childName" required>
        </div>

        <div class="childGender"><label for="childGender">Child's Gender:</label>
            <input type="radio" name="childGender" value="girl" id="girl" required>
            <label for="girl">Girl</label>
            <input type="radio" name="childGender" value="boy" id="boy" required>
            <label for="boy">Boy</label>
        </div>

        <div class="teacherName"> <label for="teacherName">Teacher's Name:</label>
            <input type="text" name="teacherName" id="teacherName" required>
        </div>

        <label>Reason for Absence:</label>
        <div class="absenceReason"><input type="radio" name="absenceReason" value="illness" id="illness" required>
            <label for="illness">Illness</label>

            <input type="radio" name="absenceReason" value="pet" id="pet" required>
            <label for="pet">Death of the Pet</label>

            <input type="radio" name="absenceReason" value="extra-curricular" id="extra-curricular" required>
            <label for="extra-curricular">Significant Extra-curricular Activity</label>

            <input type="radio" name="absenceReason" value="other" id="other" required>
            <label for="other">Other</label>
        </div>

        <input type="submit" name="submit" value="Generate Apology Letter">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $childName = isset($_POST['childName']) ? $_POST['childName'] : '';
        $childGender = isset($_POST['childGender']) ? $_POST['childGender'] : '';
        $teacherName = isset($_POST['teacherName']) ? $_POST['teacherName'] : '';
        $absenceReason = isset($_POST['absenceReason']) ? $_POST['absenceReason'] : '';


        $currentDate = date("l, \\t\\h\\e jS F Y");


        $politePhrase = "Dear $teacherName,";

        $excuse = '';

        switch ($absenceReason) {
            case 'illness':
                $apologies = array(
                    "I regret to inform you that my $childGender, $childName, is unable to attend school today due to illness.",
                    "I'm sorry to inform you that my $childGender, $childName, won't be able to come to school today as they are feeling unwell.",
                    "Unfortunately, my $childGender, $childName, is not feeling well today and won't be able to attend school.",
                    "I apologize for the short notice, but my $childGender, $childName, is sick and won't be able to attend classes today.",
                    "Please accept my apologies for my $childGender, $childName's absence today due to illness."
                );
                $excuse = $politePhrase . $apologies[array_rand($apologies)];
                break;
            case 'pet-death':
                $apologies = array(
                    "I'm writing to inform you that my $childGender, $childName, experienced a loss in the family and won't be able to attend school today.",
                    "My $childGender, $childName, is grieving the loss of a beloved pet and won't be able to come to school today.",
                    "Due to a recent family tragedy, my $childGender, $childName, needs the day off from school.",
                    "I regret to inform you that my $childGender, $childName, is unable to attend school today due to a family member's passing.",
                    "Please excuse my $childGender, $childName's absence today as they are mourning the loss of a pet."
                );
                $excuse = $politePhrase . $apologies[array_rand($apologies)];
                break;
            case 'extra-curricular':
                $apologies = array(
                    "I wanted to inform you that my $childGender, $childName, will not be able to attend school today due to an important extra-curricular activity.",
                    "My $childGender, $childName, has a significant extra-curricular engagement today, which requires their absence from school.",
                    "Please excuse my $childGender, $childName's absence today as they are participating in a crucial extra-curricular event.",
                    "I apologize for the inconvenience, but my $childGender, $childName, won't be able to attend classes today due to a prior extra-curricular commitment.",
                    "I regret to inform you that my $childGender, $childName, has an important extra-curricular obligation today, and they won't be able to attend school."
                );
                $excuse = $politePhrase . $apologies[array_rand($apologies)];
                break;
            case 'other':
                $apologies = array(
                    "I'm writing to let you know that my $childGender, $childName, won't be able to come to school today for personal reasons.",
                    "Please accept my apologies for my $childGender, $childName's absence today due to personal circumstances.",
                    "Unfortunately, my $childGender, $childName, won't be able to attend school today for personal reasons.",
                    "I apologize for the inconvenience caused, but my $childGender, $childName, needs the day off from school due to personal matters.",
                    "Please excuse my $childGender, $childName's absence today as they have some personal matters to attend to."
                );
                $excuse = $politePhrase . $apologies[array_rand($apologies)];
                break;
        }

        if (!empty($excuse)) {
            echo "<p>$currentDate\n\n$excuse\n\nSincerely,\nParent</p>";
        }
    }
    ?>
</body>

</html>