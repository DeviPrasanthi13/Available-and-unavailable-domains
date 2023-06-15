<!DOCTYPE html>
<html>
<head>
  <title>Two-Letter Domain Gallery</title>
 
</head>
<body>
  

  <div class="destination" id="domainDestination">
    <?php
	
	ini_set('max_execution_time', 1000); // Set the maximum execution time to 1000 seconds

    // Array of two-letter domain names
    $domains = file("ss2.txt", FILE_IGNORE_NEW_LINES);

    // Separate available and unavailable domains
    $availableDomains = [];
    $unavailableDomains = [];

    foreach ($domains as $domain) {
      
       if (checkDomainAvailability($domain)) {
        $availableDomains[] = $domain;
    } else {
        $unavailableDomains[] = $domain;
    }
}

echo "<h3>Available Domains</h3>";
    foreach ($availableDomains as $domain) {
      echo $domain . "<br>";
    }

    echo "<h3>Unavailable Domains</h3>";
    foreach ($unavailableDomains as $domain) {
      echo $domain . "<br>";
    }
    
    // Function to check domain availability
    function checkDomainAvailability($domain) {
      $ip = gethostbyname($domain);
      return $ip !== $domain;
    }
    ?>
  </div>
</body>
</html>
