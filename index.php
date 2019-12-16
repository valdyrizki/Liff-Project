<!DOCTYPE HTML>
<html>
 
<head>
    <title>Catatan Harianku</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
 
    <style>
        .table>thead>tr>th {
            padding: 60px;
        }
    </style>
 
 
</head>
 
<body onload="loadCatatan();">
 
    <div class="col-xs-12 col-md-8 col-md-offset-2" ng-controller="listContactCtrl">
        <div class="page-header">
            <h1 align="center">
                Catatan Harianku
            </h1>
            <ul class="nav nav-pills">
                <li><a id="nav-list-catatan" href="javascript:void(0);" onclick="gantiMenu('list-catatan');">List Catatan</a></li>
                <li><a id="nav-tambah-catatan" href="javascript:void(0);" onclick="gantiMenu('tambah-catatan');">Tambah Catatan</a></li>
            </ul>
 
        </div>
        <div id="tambah-catatan" class="well" style="display:none;">
            <form id="form-data">
                <div id="nama-group" class="form-group">
                    <label>Nama:</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
                <div id="tanggal-group" class="form-group">
                    <label>Tanggal:</label>
                    <input type="text" class="form-control" id="tanggal" name="tanggal">
                </div>
                <div id="agenda-group" class="form-group">
                    <label>Agenda:</label>
                    <textarea class="form-control" id="agenda" name="agenda"></textarea><br />
                </div>
                <input type="button" value="Simpan" onclick="simpanData();" class="btn btn-success btn-small" />
                <input type="reset" value="Reset" onclick="" class="btn btn-warning btn-small" />
            </form>
        </div>
 
        <div id="edit-data" class="well" style="display:none;">
            <form id="eform-data">
 
                <div id="nama-group" class="form-group" style="display:none;">
                    <label>id data:</label>
                    <input type="text" class="form-control" id="eid_data" name="nama">
                </div>
 
                <div id="nama-group" class="form-group">
                    <label>Nama:</label>
                    <input type="text" class="form-control" id="enama" name="nama">
                </div>
                <div id="tanggal-group" class="form-group">
                    <label>Tanggal:</label>
                    <input type="text" class="form-control" id="etanggal" name="tanggal">
                </div>
                <div id="agenda-group" class="form-group">
                    <label>Agenda:</label>
                    <textarea class="form-control" id="eagenda" name="agenda"></textarea><br />
                </div>
                <input type="button" value="Simpan" onclick="simpanEditData();" class="btn btn-success btn-small" />
                <input type="reset" value="Reset" onclick="" class="btn btn-warning btn-small" />
                <input type="button" value="Cancel" onclick="gantiMenu('list-catatan');"
                    class="btn btn-warning btn-small" />
            </form>
        </div>
 
        <div id="lihat-data" class="well" style="display:none;">
            <form id="eform-data">
 
                <div id="nama-group" class="form-group" style="display:none;">
                    <label for="disabled">id data:</label>
                    <input type="text" class="form-control" id="lid_data" name="nama" disabled>
                </div>
 
                <div id="nama-group" class="form-group">
                    <label for="disabled">Nama:</label>
                    <input type="text" class="form-control" id="lnama" name="nama" disabled>
                </div>
                <div id="tanggal-group" class="form-group">
                    <label for="disabled">Tanggal:</label>
                    <input type="text" class="form-control" id="ltanggal" name="tanggal" disabled>
                </div>
                <div id="agenda-group" class="form-group">
                    <label for="disabled">Agenda:</label>
                    <textarea class="form-control" id="lagenda" name="agenda" disabled></textarea>
                </div>
                <input type="button" value="Kembali" onclick="gantiMenu('list-catatan');"
                    class="btn btn-warning btn-small" />
            </form>
        </div>
 
 
        <div id="list-catatan" class="well">
            Pilih List Catatan untuk melihat catatan yang sudah dibuat.
        </div>
 
        <!--Konten LIFF v2-->
 
        <div id="liffAppContent">
            <!-- ACTION BUTTONS -->
            <div class="buttonGroup">
                <div class="buttonRow">
                    <button id="openWindowButton" class="btn btn-success btn-small">Open External Window</button>
                    <button id="closeWindowButton" class="btn btn-danger btn-small">Close LIFF App</button>
                    <button id="sendMessageButton" class="btn btn-warning btn-small">Send Message</button>
                </div>
 
            </div>
 
            <!-- LIFF DATA -->
            <div id="liffData">
                <h3 id="liffDataHeader" class="textLeft">Informasi:</h3>
                <table>
                    <tr>
                        <th>isInClient : </th>
                        <td id="isInClient" class="textLeft"></td>
                    </tr>
                    <tr>
                        <th>isLoggedIn : </th>
                        <td id="isLoggedIn" class="textLeft"></td>
                    </tr>
                </table>
            </div>
            <!-- LOGIN LOGOUT BUTTONS -->
            <div class="buttonGroup">
                <button id="liffLoginButton" class="btn btn-success btn-small">Log in</button>
                <button id="liffLogoutButton" class="btn btn-warning btn-small">Log out</button>
            </div>
            <div id="statusMessage">
                <div id="isInClientMessage"></div>
                <div id="apiReferenceMessage">
                    <p>Available LIFF methods vary depending on the browser you use to open the LIFF app.</p>
                    <p>Please refer to the <a
                            href="https://developers.line.biz/en/reference/liff/#initialize-liff-app">API reference
                            page</a> for more information.</p>
                </div>
            </div>
        </div>
        <!-- LIFF ID ERROR -->
        <div id="liffIdErrorMessage" class="hidden">
            <p>You have not assigned any value for LIFF ID.</p>
            <p>If you are running the app using Node.js, please set the LIFF ID as an environment variable in your
                Heroku account follwing the below steps: </p>
            <code id="code-block">
                <ol>
                    <li>Go to `Dashboard` in your Heroku account.</li>
                    <li>Click on the app you just created.</li>
                    <li>Click on `Settings` and toggle `Reveal Config Vars`.</li>
                    <li>Set `MY_LIFF_ID` as the key and the LIFF ID as the value.</li>
                    <li>Your app should be up and running. Enter the URL of your app in a web browser.</li>
                </ol>
            </code>
            <p>If you are using any other platform, please add your LIFF ID in the <code>index.html</code> file.</p>
            <p>For more information about how to add your LIFF ID, see <a
                    href="https://developers.line.biz/en/reference/liff/#initialize-liff-app">Initializing the LIFF
                    app</a>.</p>
        </div>
        <!-- LIFF INIT ERROR -->
        <div id="liffInitErrorMessage" class="hidden">
            <p>Something went wrong with LIFF initialization.</p>
            <p>LIFF initialization can fail if a user clicks "Cancel" on the "Grant permission" screen, or if an error occurs in the process of <code>liff.init()</code>.
        </div>
        <!-- NODE.JS LIFF ID ERROR -->
        <div id="nodeLiffIdErrorMessage" class="hidden">
            <p>Unable to receive the LIFF ID as an environment variable.</p>
        </div>
        
    </div>
</body>
<script src="https://static.line-scdn.net/liff/edge/2.1/sdk.js"></script>
<script src="catatan-config.js"></script>
<script src="liff-starter.js"></script>
</html>