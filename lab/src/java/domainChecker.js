document.getElementById("domainForm").addEventListener("submit", function(event) {
    event.preventDefault();
    var domain = document.getElementById("domainInput").value;
    var apiKey = 'at_LBtOIAeU3lERWfSYge1qjxVRcLMBF';
    var apiUrl = `https://www.whoisxmlapi.com/whoisserver/WhoisService?apiKey=${apiKey}&domainName=${domain}&outputFormat=JSON`;

    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            if (data.ErrorMessage) {
                document.getElementById("result").innerHTML = `<p>${data.ErrorMessage}</p>`;
            } else {
                var domainName = data.WhoisRecord.domainName;
                var country = data.WhoisRecord.country;
                var region = data.WhoisRecord.location.region;
                var city = data.WhoisRecord.location.city;
                var isp = data.WhoisRecord.registrant.organization;

                document.getElementById("result").innerHTML = `
                    <p>Domain: ${domainName}</p>
                    <p>Country: ${country}</p>
                    <p>Region: ${region}</p>
                    <p>City: ${city}</p>
                    <p>ISP: ${isp}</p>
                `;
            }
        })
        .catch(error => console.error('Error:', error));
});
