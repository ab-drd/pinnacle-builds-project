<?php
    if (isset($_GET["component"])) {
        require_once "./includes/compClasses.inc.php";
        require_once "./includes/connect.inc.php";

        if ($_GET["component"] == "cpu") {
            listCPUs();
        }
        else if ($_GET["component"] == "cpu_fan") {
            listCPUfFans();
        }
        else if ($_GET["component"] == "ram") {
            listRAM();
        }
        else if ($_GET["component"] == "motherboard") {
            listMotherboards();
        }
        else if ($_GET["component"] == "psu") {
            listPSU();
        }
        else if ($_GET["component"] == "ssd") {
            listSSD();
        }
        else if ($_GET["component"] == "hdd") {
            listHDD();
        }
        else if ($_GET["component"] == "gpu") {
            listGPU();
        }
        else if ($_GET["component"] == "pc_case") {
            listPCCases();
        }

    }

    function listCPUs() {
        $CPUquery = "SELECT * FROM CPU JOIN component AS c ON CPU.id = c.id";
        $result = pg_query($db_connection, $CPUquery);

        if (pg_num_rows($result) > 0) {
            $cpu_array = array();
            $counter = 0;

            while ($row = pg_fetch_assoc($result)) {

                $cpu_object = new CPU($row['id'], $row['model'], $row['unit_price'], $row['quantity'], $row['socket'], $row['cores'],
                                      $row['threads'], $row['clock_speed'], $row['boost_clock_speed'], $row['stock_included'], $row['tdp']);
                
                $cpu_array[$counter] = (array) $cpu_object;
                $counter++;
            }

            $CPU_json = json_encode($cpu_array);
            echo $CPU_json;
        }
    }

    function listCPUFans() {
        $query = "SELECT * FROM CPU_fan JOIN component AS c ON CPU.id = c.id";
        $result = pg_query($db_connection, $query);

        if (pg_num_rows($result) > 0) {
            $cpu_fan_array = array();
            $counter = 0;

            while ($row = pg_fetch_assoc($result)) {

                $cpu_fan_object = new CPU_fan($row['id'], $row['model'], $row['unit_price'], $row['quantity'], $row['length']);
                
                $cpu_fan_array[$counter] = (array) $cpu_fan_object;
                $counter++;
            }

            $CPU_fan_json = json_encode($cpu_fan_array);
            echo $CPU_fan_json;
        }
    }

    function listRAM() {
        $query = "SELECT * FROM RAM JOIN component AS c ON RAM.id = c.id";
        $result = pg_query($db_connection, $query);

        if (pg_num_rows($result) > 0) {
            $RAM_array = array();
            $counter = 0;

            while ($row = pg_fetch_assoc($result)) {

                $RAM_object = new RAM($row['id'], $row['model'], $row['unit_price'], $row['quantity'], $row['length']);
                
                $RAM_array[$counter] = (array) $RAM_object;
                $counter++;
            }

            $RAM_json = json_encode($RAM_array);
            echo $RAM_json;
        }
    }

    function listMotherboards() {
        $query = "SELECT * FROM motherboard AS m JOIN component AS c ON m.id = c.id";
        $result = pg_query($db_connection, $query);

        if (pg_num_rows($result) > 0) {
            $motherboard_array = array();
            $counter = 0;

            while ($row = pg_fetch_assoc($result)) {
                $motherboard_object = new Motherboard($row['id'], $row['model'], $row['unit_price'], $row['quantity'], $row['socket'],
                                      $row['form'], $row['chipset'], $row['safe_cpu_tdp']);
                
                $motherboard_array[$counter] = (array) $motherboard_object;
                $counter++;
            }

            $motherboard_json = json_encode($motherboard_array);
            echo $motherboard_json;
        }
    }

    function listPSU() {
        $query = "SELECT * FROM PSU AS p JOIN component AS c ON p.id = c.id";
        $result = pg_query($db_connection, $query);

        if (pg_num_rows($result) > 0) {
            $PSU_array = array();
            $counter = 0;

            while ($row = pg_fetch_assoc($result)) {
                $PSU_object = new PSU($row['id'], $row['model'], $row['unit_price'], $row['quantity'], $row['power'],
                                      $row['isfullymodular'], $row['fan'], $row['certificate']);
                
                $PSU_array[$counter] = (array) $PSU_object;
                $counter++;
            }

            $PSU_json = json_encode($PSU_array);
            echo $PSU_json;
        }
    }

    function listSSD() {
        $query = "SELECT * FROM SSD AS s JOIN component AS c ON s.id = c.id";
        $result = pg_query($db_connection, $query);

        if (pg_num_rows($result) > 0) {
            $SSD_array = array();
            $counter = 0;

            while ($row = pg_fetch_assoc($result)) {
                $SSD_object = new SSD($row['id'], $row['model'], $row['unit_price'], $row['quantity'], $row['format'],
                                      $row['interface'], $row['seq_write_speed'], $row['seq_read_speed'], $row['capacity']);
                
                $SSD_array[$counter] = (array) $SSD_object;
                $counter++;
            }

            $SSD_json = json_encode($SSD_array);
            echo $SSD_json;
        }
    }

    function listHDD() {
        $query = "SELECT * FROM HDD AS h JOIN component AS c ON h.id = c.id";
        $result = pg_query($db_connection, $query);

        if (pg_num_rows($result) > 0) {
            $HDD_array = array();
            $counter = 0;

            while ($row = pg_fetch_assoc($result)) {
                $HDD_object = new HDD($row['id'], $row['model'], $row['unit_price'], $row['quantity'],
                                      $row['format'], $row['rotation_speed'], $row['capacity']);
                
                $HDD_array[$counter] = (array) $HDD_object;
                $counter++;
            }

            $HDD_json = json_encode($HDD_array);
            echo $HDD_json;
        }
    }

    function listGPU() {
        $query = "SELECT * FROM GPU AS g JOIN component AS c ON g.id = c.id";
        $result = pg_query($db_connection, $query);

        if (pg_num_rows($result) > 0) {
            $GPU_array = array();
            $counter = 0;

            while ($row = pg_fetch_assoc($result)) {
                $GPU_object = new GPU($row['id'], $row['model'], $row['unit_price'], $row['quantity'], $row['boost_clock'],
                                      $row['memory_capacity'], $row['memory_type'], $row['length']);
                
                $GPU_array[$counter] = (array) $GPU_object;
                $counter++;
            }

            $GPU_json = json_encode($GPU_array);
            echo $GPU_json;
        }
    }

    function listPCCases() {
        $query = "SELECT * FROM PC_case AS p JOIN component AS c ON p.id = c.id";
        $result = pg_query($db_connection, $query);

        if (pg_num_rows($result) > 0) {
            $PC_case_array = array();
            $counter = 0;

            while ($row = pg_fetch_assoc($result)) {
                $PC_case_object = new PC_Case($row['id'], $row['model'], $row['unit_price'], $row['quantity'], $row['format'], $row['height'],
                                              $row['width'], $row['length'], $row['weight'], $row['gpu_length'], $row['cooler_height']);
                
                $PC_case_array[$counter] = (array) $PC_case_object;
                $counter++;
            }

            $PC_case_json = json_encode($PC_case_array);
            echo $PC_case_json;
        }
    }
?>