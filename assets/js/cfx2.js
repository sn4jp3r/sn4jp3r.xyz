const getBtn = document.getElementById('visualzBtn');
const visualzApi = () => {
    var visualzIpReplace = document.getElementById('visualzCfx').value;
    var visualzIP = visualzIpReplace.replace("cfx.re/join/", "");
    const xhr = new XMLHttpRequest();
    const url = `https://servers-frontend.fivem.net/api/servers/single/${visualzIP}`;
    xhr.open('GET', url);

    xhr.responseType = 'json';

    xhr.onload = () => {
        const data = xhr.response;
        var text = data['Data']['hostname'];
        var serverName = text.replace(/\^1/g, "").replace(/\^2/g, "").replace(/\^3/g, "").replace(/\^4/g, "").replace(/\^5/g, "").replace(/\^6/g, "").replace(/\^7/g, "").replace(/\^8/g, "").replace(/\^9/g, "").replace(/\^0/g, "");
        document.getElementById('serverName').innerHTML = "Server Name: " + serverName;

        var gamebuild = data['Data']['vars']['sv_enforceGameBuild'];
        document.getElementById('serverGamebuild').innerHTML = "Gamebuild: " + gamebuild;

        var playersOnline = data['Data']['clients'];
        var maxPlayers = data['Data']['sv_maxclients'];
        document.getElementById('serverPlayers').innerHTML = "Players: " + playersOnline + "/" + maxPlayers;

        var onesync = data['Data']['vars']['onesync_enabled'];
        document.getElementById('serverOnesync').innerHTML = "Onesync: " + onesync;

        var serverOwner = data['Data']['ownerProfile'];
        document.getElementById('serverOwner').innerHTML = "Owner Profile: " + serverOwner;

        var address = data['Data']['connectEndPoints']['0'];
        if (address !== undefined) {
            if (address.startsWith('http')) {
                const xhr2 = new XMLHttpRequest();
                const owner = data['Data']['ownerName'];
                const url2 = `https://visualz-fix-cors.herokuapp.com/https://${owner}-${visualzIP}.users.cfx.re/client`;
                xhr2.open('POST', url2, true);
                xhr2.responseType = 'json';
                xhr2.onload = () => {
                    const dataip = xhr2.response;
                    var ip = dataip[0]
                    document.getElementById('serverAddress').innerHTML = "Server Ip Address: " + ip;

                    var visualzIpxx = ip.split(":");
                    var ipx = visualzIpxx[0]
                    const xhr3 = new XMLHttpRequest();
                    const url3 = `https://visualz-fix-cors.herokuapp.com/http://ip-api.com/json/${ipx}`;
                    xhr3.open('GET', url3, true);
                    xhr3.responseType = 'json';
                    xhr3.onload = () => {
                        const dataip = xhr3.response;
                        if (dataip['country'] === undefined) {
                            console.log("timeout");
                            var country = 'Timeout'
                            var isp = 'Timeout'
                            var city = 'Timeout'
                        } else {
                            console.log("loaded");
                            var country = dataip['country']
                            var isp = dataip['isp']
                            var city = dataip['city']
                        }
                        document.getElementById('serverCountry').innerHTML = "Country: " + country;
                        document.getElementById('serverISP').innerHTML = "ISP: " + isp;
                    };
                    xhr3.send();
                };
                xhr2.send('method=getEndpoints');
            } else {
                document.getElementById('serverAddress').innerHTML = "Server Ip Address - " + address;
                document.getElementById('playersJson').innerHTML = "Players json - <a href='http://" + address + "/players.json'>" + "http://" + address + "/players.json</a>";
                document.getElementById('dynamicJson').innerHTML = "Dynamic json - <a href='http://" + address + "/dynamic.json'>" + "http://" + address + "/dynamic.json</a>";
                document.getElementById('infoJson').innerHTML = "Info json - <a href='http://" + address + "/info.json'>" + "http://" + address + "/info.json</a>";
                var visualzIpxx = address.split(":");
                var ipx = visualzIpxx[0]
                const xhr3 = new XMLHttpRequest();
                const url3 = `https://visualz-fix-cors.herokuapp.com/http://ip-api.com/json/${ipx}`;
                xhr3.open('GET', url3, true);
                xhr3.responseType = 'json';
                xhr3.onload = () => {
                    const dataip = xhr3.response;
                    if (dataip['country'] === undefined) {
                        console.log("timeout");
                        var country = 'Timeout'
                        var isp = 'Timeout'
                        var city = 'Timeout'
                    } else {
                        console.log("loaded");
                        var country = dataip['country']
                        var isp = dataip['isp']
                        var city = dataip['city']
                    }
                    document.getElementById('serverCountry').innerHTML = "Country: " + country;
                    document.getElementById('serverISP').innerHTML = "ISP: " + isp;
                };
                xhr3.send();
            }
        } else {
            const xhr3 = new XMLHttpRequest();
            const owner3 = data['Data']['ownerName'];
            const url3 = `https://visualz-fix-cors.herokuapp.com/https://${owner3}-${visualzIP}.users.cfx.re/client`;
            xhr3.open('POST', url3, true);
            xhr3.responseType = 'json';
            xhr3.onload = () => {
                const dataip = xhr3.response;
                var ip = dataip[0]
                document.getElementById('serverAddress').innerHTML = "Server Address: " + ip;
                var visualzIpxx = ip.split(":");
                var ipx = visualzIpxx[0]
                const xhr4 = new XMLHttpRequest();
                const url4 = `https://visualz-fix-cors.herokuapp.com/http://ip-api.com/json/${ipx}`;
                xhr4.open('GET', url3, true);
                xhr4.responseType = 'json';
                xhr4.onload = () => {
                    const dataip = xhr4.response;
                    if (dataip['country'] === undefined) {
                        console.log("timeout");
                        var country = 'Timeout'
                        var isp = 'Timeout'
                        var city = 'Timeout'
                    } else {
                        console.log("loaded");
                        var country = dataip['country']
                        var isp = dataip['isp']
                        var city = dataip['city']
                    }
                    document.getElementById('serverCountry').innerHTML = "Country: " + country;
                    document.getElementById('serverISP').innerHTML = "ISP: " + isp;
                };
                xhr4.send();
            };
            xhr3.send('method=getEndpoints');
        }
    };
    xhr.send();
}
getBtn.addEventListener('click', visualzApi);

do_ping()