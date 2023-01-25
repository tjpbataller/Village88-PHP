<style>
    *{
        font-size: 42px;
        font-family: sans-serif, arial;
    }
    table{
        margin: 20px auto;
    }
    tr{
        color: blue;
    }
    tr.colored{
        color: red;
    }
    th, td{
        outline: 2px solid black;
        padding: 5px 10px;
        text-align: center;
    }
</style>
<?php
echo "<table>
<thead>
    <th>B</th>
    <th>I</th>
    <th>N</th>
    <th>G</th>
    <th>O</th>
</thead>
<tbody>
    <tr>
        <td>2</td>
        <td>4</td>
        <td>6</td>
        <td>8</td>
        <td>10</td>
    </tr>
    <tr class='colored'>
        <td>3</td>
        <td>6</td>
        <td>9</td>
        <td>12</td>
        <td>15</td>
    </tr>
    <tr>
        <td>4</td>
        <td>8</td>
        <td>12</td>
        <td>16</td>
        <td>20</td>
    </tr>
    <tr class='colored'>
        <td>5</td>
        <td>10</td>
        <td>15</td>
        <td>20</td>
        <td>25</td>
    </tr>
    <tr>
        <td>6</td>
        <td>12</td>
        <td>18</td>
        <td>24</td>
        <td>30</td>
    </tr>
</tbody>
</table>";