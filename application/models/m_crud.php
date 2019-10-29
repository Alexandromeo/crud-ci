<?php

class m_crud extends CI_Model
{
	public function getData($select, $table, $where=false)
	{
		if($where)
		{
			return $this->db
						->get_where($table, $where)
						->row();	
		}

		else
		{
			//select from table
			return $this->db
						  ->select($select)
						  ->get($table)
						  ->result();
		}
	}

	public function insertData($table, $values)
	{
		//insert into table values ....
		return $this->db
					->insert($table, $values);
	}

	public function updateData($table, $set, $where)
	{
		//update table set key=value where pk=value
		return $this->db
					->where($where)
					->update($table, $set);
	}

	public function deleteData($table, $where)
	{
		//delete from table where ...
		return $this->db
					->where($where)
					->delete($table);
	}
}