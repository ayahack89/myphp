<?php
$xml = <<<XML
<people>
    <person>
        <name>Bob</name>
        <age>45</age>
        <hobby>Programming</hobby>
    </person>
    <person>
        <name>Jim</name>
        <age>40</age>
        <hobby>Study</hobby>
    </person>
    <person>
        <name>Ron</name>
        <age>50</age>
        <hobby>Dancing</hobby>
    </person>
</people>
XML;

$responseXML = new SimpleXMLElement($xml);

// Populate dropdown
populateDropdown($responseXML);

function getInfo() {
    $name = $_POST["names"]; // Assuming the selected value is sent via POST

    global $responseXML;

    foreach ($responseXML->person as $person) {
        if ((string)$person->name == $name) {
            echo "Name: " . $person->name . "<br>Age: " . $person->age . "<br>Hobby: " . $person->hobby;
            break;
        }
    }
}

function populateDropdown($xml) {
    echo '<select id="names" onchange="getInfo()">';
    foreach ($xml->person as $person) {
        echo '<option value="' . $person->name . '">' . $person->name . '</option>';
    }
    echo '</select>';
}
?>
