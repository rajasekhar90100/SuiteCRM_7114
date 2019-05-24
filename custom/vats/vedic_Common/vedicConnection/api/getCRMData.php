<?php
$x = <<<XYZ
{
    "status": "ok",
    "data": {
        "contactdata": [{
            "Id": "741fb764-ec4e-cc25-96ab-5506b58957a3",
            "Name": "Nick Sharma",
            "first_name": "Nick",
            "last_name": "Sharma",
            "title": "",
            "email1": "",
            "ReportsToId": "",
            "Account": "\"{}\""
        },{
            "Id": "4e4cf7ce-fd33-72ce-524b-546a67a42029",
            "Name": "Akshay K. Deshpande",
            "first_name": "Akshay K.",
            "last_name": "Deshpande",
            "title": "",
            "email1": "akshay@vedicsoft.com",
            "ReportsToId": "741fb764-ec4e-cc25-96ab-5506b58957a3",
            "Account": "\"{}\""
        },{
            "Id": "84ff05a1-cc74-95e0-4206-56980ca56201",
            "Name": "Pradeep Bansod",
            "first_name": "Pradeep",
            "last_name": "Bansod",
            "title": "",
            "email1": "",
            "ReportsToId": "741fb764-ec4e-cc25-96ab-5506b58957a3",
            "Account": "\"{}\""
        }]
    }
}
XYZ;
echo $x;
?>
