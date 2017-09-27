<?php //include"head.php"?>
<h4><b>Tools</b></h4>
<h3>coming soon</h3>
<div class="row" style="display:none">
    <div class="col-sm-6 tool-wrapper">
        <button type="button" class="btn btn-tool" id="btn-tool1">Pencarian Berdasarkan Grup</button>
        <form class="tool" id="tool1">
            <div class="form-group">
                <label for="exampleInputEmail1">Mata praktikum</label>
                <select class="form-control">
                    <option>KDP</option>
                    <option>PIK</option>
                    <option>SDA</option>
                    <option>SMDB</option>
                    <option>PDS</option>
                    <option>PBO</option>
                    <option>DAA</option>
                </select>
            </div>
            <div class="form-group ">
                <label for="exampleInputEmail1">Grup lab</label>
                <select class="form-control">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                </select>
            </div>
            <button type="submit" class="btn btn-default" style="margin: auto;">Submit</button>
        </form>
    </div>
    <div class="col-sm-6 tool-wrapper">
        <button type="button" class="btn btn-tool" id="btn-tool2">Pencarian Berdasarkan NIM Praktikan</button>
        <form class="tool" id="tool2">
            <div class="form-group">
                <label for="exampleInputEmail1">NIM</label>
                <input type="text" class="form-control" id="">
            </div>
            <button type="submit" class="btn btn-default" style="margin: auto;">Submit</button>
        </form>
    </div>
</div>
<div class="row" style="display:none">
    <div class="col-sm-6 tool-wrapper">
        <button type="button" class="btn btn-tool">Pencarian Jadwal Kosong</button>
    </div>
</div>