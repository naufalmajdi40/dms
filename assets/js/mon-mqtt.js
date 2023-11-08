var host = "203.194.112.238";
var port = 8083;
var userId = "das";
var passwordId = "mgi2023";
var coba = "80deg";
var grafikData;
var datacoba;
startConnect()

function startConnect() {
    clientID = "dmscuy-" + parseInt(Math.random() * 100);
    client = new Paho.MQTT.Client(host, Number(port), clientID);
    $("#mdbusChartIA").attr("data-ratio", coba);
    client.onConnectionLost = onConnectionLost;
    client.onMessageArrived = onMessageArrived;

    client.connect({
        onSuccess: onConnect,
        //  userName: userId,
        //  passwordId: passwordId,
    });
}

function onConnect() {
    topic = "DMS/#";
    client.subscribe(topic);
    console.log("connected")
}

function onConnectionLost(responseObject) {
    //alert("lost connection")
    if (responseObject != 0) {
        //alert("error not connected")
        startConnect()

    }
}

function timeConverter(UNIX_timestamp) {
    let date = new Date(parseInt(UNIX_timestamp))
    var date_string = date.toLocaleString('en-GB');

    return date_string;
}

function onMessageArrived(message) {

    dataMon = JSON.parse($('#mon_data').val())
    parsemsg = JSON.parse(message.payloadString)
    parseDest = message.destinationName.split("/")
    machine_code = (parseDest[1])
    id_device = (parseDest[3])
    item_id = (parseDest[4])
    alias = parsemsg.alias
        //console.log(parseDest)
        // console.log(data)

    for (let i = 0; i < dataMon.data.length; i++) {
        //console.log(dataMon.data[i].id_device + "===" + id_device)
        //console.log(dataMon.data[i].machine_code + "===" + machine_code)
        let itemId = dataMon.data[i].item_id.replaceAll("$", ".")
            //        console.log(itemId + "====" + item_id)
        if (dataMon.data[i].id_device == id_device && dataMon.data[i].machine_code == machine_code && dataMon.data[i].alias == alias) {
            //console.log(parsemsg.dataType)

            if (parsemsg.dataType == "float" || parsemsg.dataType == "integer") {
                let val = parseFloat(parsemsg.val)
                if (parsemsg.dataType == "float") {
                    $(`#val_${machine_code}_${id_device}_${alias}`).text(val.toFixed(3))
                } else {
                    val = parseInt(parsemsg.val)
                    $(`#val_${machine_code}_${id_device}_${alias}`).text(val)
                }
                console.log(dataMon.data[i])
                const deg = (val / 100) * 180;

                try {
                    document
                        .getElementById(`gg_${machine_code}_${id_device}_${alias}`)
                        .style.setProperty("--rotation", deg + "deg");
                } catch (err) {
                    console.log(err)
                }
            } else if (parsemsg.dataType == "boolean") {
                let val = parsemsg.val

                if (val == "True") {
                    $(`.ll_${machine_code}_${id_device}_${alias}`).removeClass("l-second")
                    $(`.ll_${machine_code}_${id_device}_${alias}`).addClass("l-red")

                } else {
                    $(`.ll_${machine_code}_${id_device}_${alias}`).removeClass("l-red")
                    $(`.ll_${machine_code}_${id_device}_${alias}`).addClass("l-second")

                }
            } else if (parsemsg.dataType == "visible-string") {

                let val = parsemsg.val
                    //console.log(val)
                if (val.length < 20) {
                    $(`#txt_${machine_code}_${id_device}_${alias}`).html(`<br><b>${val}</b>`)
                } else {
                    $(`#txt_${machine_code}_${id_device}_${alias}`).html(`<b ">${val}</br>`)
                }

            } else if (parsemsg.dataType == "utc-time") {

                let val = timeConverter(parsemsg.val)
                    // console.log(val)
                if (val.length < 25) {
                    $(`#txt_${machine_code}_${id_device}_${alias}`).html(`<br><b>${val}</b>`)
                } else {
                    $(`#txt_${machine_code}_${id_device}_${alias}`).html(`<b>${val}</b>`)
                }

            }
        }
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