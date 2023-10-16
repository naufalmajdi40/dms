var host = "203.194.112.238";
var port = 8083;
var userId = "das";
var passwordId = "mgi2023";
var coba = "80deg";
var grafikData;
var datacoba;

function startConnect() {
    clientID = "dms-" + parseInt(Math.random() * 100);
    client = new Paho.MQTT.Client(host, Number(port), clientID);
    $("#mdbusChartIA").attr("data-ratio", coba);
    client.onConnectionLost = onConnectionLost;
    client.onMessageArrived = onMessageArrived;

    client.connect({
        onSuccess: onConnect,
        // userName: userId,
        // passwordId: passwordId,
    });
}

function onConnect() {
    topic = "DMS/0001/#";
    client.subscribe(topic);
}

function onConnectionLost(responseObject) {
    document.getElementById("messages").innerHTML +=
        "<span> ERROR: Connection is lost.</span><br>";
    if (responseObject != 0) {
        document.getElementById("messages").innerHTML +=
            "<span> ERROR:" + responseObject.errorMessage + "</span><br>";
    }
}

function onMessageArrived(message) {
    // console.log("OnMessageArrived: " + message.payloadString);

    if (message.destinationName == "DMS/0001/MODBUS/1/IA") {
        const IAvalue = JSON.parse(message.payloadString);
        const percentMDIA = (IAvalue.val / 4) * 180;
        document.getElementById("mdbusIA").innerHTML =
            "<span>" + IAvalue.val + "A</span><br>";
        document
            .getElementById("perMDCA")
            .style.setProperty("--rotation", percentMDIA + "deg");
    }
    if (message.destinationName == "DMS/0001/MODBUS/1/IB") {
        const IBvalue = JSON.parse(message.payloadString);
        const percentMDIB = (IBvalue.val / 4) * 180;
        document.getElementById("mdbusIB").innerHTML =
            "<span>" + IBvalue.val + "A</span><br>";
        document
            .getElementById("perMDCB")
            .style.setProperty("--rotation", percentMDIB + "deg");
    }
    if (message.destinationName == "DMS/0001/MODBUS/1/IC") {
        const ICvalue = JSON.parse(message.payloadString);
        const percentMDIC = (ICvalue.val / 4) * 180;
        document.getElementById("mdbusIC").innerHTML =
            "<span>" + ICvalue.val + "A</span><br>";
        document
            .getElementById("perMDCC")
            .style.setProperty("--rotation", percentMDIC + "deg");
    }
    if (message.destinationName == "DMS/0001/MODBUS/1/IN") {
        const INvalue = JSON.parse(message.payloadString);
        const percentMDIN = (INvalue.val / 4) * 180;
        document.getElementById("mdbusIN").innerHTML =
            "<span>" + INvalue.val + "A</span><br>";
        document
            .getElementById("perMDCN")
            .style.setProperty("--rotation", percentMDIN + "deg");
    }
    if (
        message.destinationName ==
        "DMS/0001/IEC61850/2/METMMXU1$MX$A$phsA$instCVal$mag$f/"
    ) {
        const iecIAvalue = JSON.parse(message.payloadString);
        const percentiecIA = (iecIAvalue.val / 6) * 180;
        console.log(iecIAvalue.val);
        console.log(percentiecIA);
        document.getElementById("iecIA").innerHTML =
            "<span>" + parseFloat(iecIAvalue.val).toFixed(3) + " A</span><br>";
        document
            .getElementById("perIECA")
            .style.setProperty("--rotation", percentiecIA + "deg");
    }
    if (
        message.destinationName ==
        "DMS/0001/IEC61850/2/METMMXU1$MX$A$phsB$instCVal$mag$f/"
    ) {
        const iecIBvalue = JSON.parse(message.payloadString);
        const percentiecIB = (iecIBvalue.val / 6) * 180;
        document.getElementById("iecIB").innerHTML =
            "<span>" + parseFloat(iecIBvalue.val).toFixed(3) + " A</span><br>";
        document
            .getElementById("perIECB")
            .style.setProperty("--rotation", percentiecIB + "deg");
    }
    if (
        message.destinationName ==
        "DMS/0001/IEC61850/2/METMMXU1$MX$A$phsC$instCVal$mag$f/"
    ) {
        const iecICvalue = JSON.parse(message.payloadString);
        const percentiecIC = (iecICvalue.val / 6) * 180;
        document.getElementById("iecIC").innerHTML =
            "<span>" + parseFloat(iecICvalue.val).toFixed(3) + " A</span><br>";
        document
            .getElementById("perIECC")
            .style.setProperty("--rotation", percentiecIC + "deg");
    }
    if (
        message.destinationName ==
        "DMS/0001/IEC61850/2/METMMXU1$MX$A$neut$instCVal$mag$f/"
    ) {
        const iecINvalue = JSON.parse(message.payloadString);
        const percentiecIN = (iecINvalue.val / 6) * 180;
        document.getElementById("iecIN").innerHTML =
            "<span>" + parseFloat(iecINvalue.val).toFixed(3) + " A</span><br>";
        document
            .getElementById("perIECN")
            .style.setProperty("--rotation", percentiecIN + "deg");
    }
}

function startDisconnect() {
    client.disconnect();
    document.getElementById("messages").innerHTML +=
        "<span> Disconnected. </span><br>";
}

function publishMessage() {
    msg = document.getElementById("Message").value;
    topic = document.getElementById("topic_p").value;

    Message = new Paho.MQTT.Message(msg);
    Message.destinationName = topic;

    client.send(Message);
    document.getElementById("messages").innerHTML +=
        "<span> Message to topic " + topic + " is sent </span><br>";
}