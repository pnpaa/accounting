<?php

class CommitteeTableSeeder extends Seeder {
	public function run()
	{
	     Committee::create([
			'committee_title' => 'Finance',
			'committee_content' => 'Finance'
		 ]);
		 Committee::create([
			'committee_title' => 'Environment',
			'committee_content' => 'Environment'
		]);
		Committee::create([
			'committee_title' => 'Information',
			'committee_content' => 'Information'
		]);
		Committee::create([
			'committee_title' => 'Education',
			'committee_content' => 'Education'
		]);

	}
}