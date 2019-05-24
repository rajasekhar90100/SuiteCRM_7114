<?php
print_r($_POST);exit;
?>

<script>
$.ajax({
    type : 'PUT',
    url : "rest/v10/Contacts/{{id}}",
    data : JSON.stringify({
        "reports_to_id": "{{reports to id}}",
    }),
    contentType: "application/json",
    beforeSend: function(request) {
        request.setRequestHeader("OAuth-Token", SUGAR.App.api.getOAuthToken());
    },
});
</script>