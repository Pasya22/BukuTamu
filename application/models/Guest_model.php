<?php
class Guest_model extends CI_Model
{
    public function insert($data)
    {
        return $this->db->insert('guests', $data);
    }

    public function get_all($date = null)
    {
        if ($date) {
            $this->db->like('created_at', $date);
        }
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('guests')->result();
    }

}
