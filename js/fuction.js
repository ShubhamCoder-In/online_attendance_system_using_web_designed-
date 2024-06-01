
  var request = [
    "./php_configue/state2.php?course=true",
    "./php_configue/state2.php?subject=true&student=true",
  ];

  // function experiesen
 async function fetch_qurrey(input = Number, request = () => null) {
    const res = fetch( request[input] )
      .then((response) => {
        if (!response.ok) {
          throw new Error("network response not ok");
        }
        return response.json();
      })
      .then(request)
      .catch((warn) => {
        console.log("something worng", warn);
      });
  }
  
  module.export = await fetch_qurrey;