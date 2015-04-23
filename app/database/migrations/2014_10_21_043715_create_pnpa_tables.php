<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePnpaTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pna_transactions', function(Blueprint $table)
		{
		    $table->increments('id');
		    $table->string('uniq_id');
		    $table->integer('user_id');
		    $table->integer('type')->default(0);
		    $table->integer('transaction_setter');
		    $table->timestamp('transaction_date')->default(DB::raw('CURRENT_TIMESTAMP'));
		    $table->text('transaction_purpose');
		    $table->decimal('transaction_amount',10,2);
		    $table->integer('is_archived')->default(0);
		});
		Schema::create('pna_roles', function(Blueprint $table)
		{
		    $table->increments('id');
		    $table->integer('role_id');
		    $table->string('role_name');
		    $table->timestamps();

		});
		Schema::create('pna_users', function(Blueprint $table)
		{
		    $table->increments('id');
		    $table->integer('role');
		    $table->integer('committee');
		    $table->string('username');
		    $table->string('password');
		    $table->string('remember_token');
		    $table->string('email');
		    $table->string('first_name');
		    $table->string('last_name');
		    $table->string('maidden_name')->nullable();
		    $table->char('gender',1)->default('M');
		    $table->date('birth_date');
		    $table->string('work')->nullable();
		    $table->string('company_working')->nullable();
		    $table->string('company_working_hours')->nullable();
		    $table->string('company_working_address')->nullable();
		    $table->string('permanent_address')->nullable();
		    $table->string('current_address')->nullable();
		    $table->string('phone_contact')->nullable();
		    $table->string('skype_contact')->nullable();
		    $table->string('facebook_contact')->nullable();
		    $table->string('linked_contact')->nullable();
		    $table->string('twitter_contact')->nullable();
		    $table->string('google_contact')->nullable();
		    $table->string('yahoo_contact')->nullable();
		    $table->string('user_about')->nullable();
		    $table->string('user_photo')->nullable();
		    $table->integer('batch');
		    $table->integer('activated')->default(1);
		    $table->integer('is_archived')->default(0);
		    $table->timestamps();
		});
		Schema::create('pna_updates', function(Blueprint $table)
		{
		    $table->increments('id');
		    $table->text('update_title')->nullable();
		    $table->text('update_content')->nullable();
		    $table->dateTime('update_start');
		    $table->dateTime('update_end');
		    $table->tinyInteger('update_allday')->default(0);
		    $table->integer('update_setter');
		    $table->integer('update_status')->default(0);
		    $table->integer('update_type')->default(0);
		    $table->integer('update_category')->default(0);
		    $table->string('update_classname')->nullable();
		    $table->text('seenzone')->nullable();
		    $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		    $table->timestamp('updated_at');
		    $table->integer('is_archived')->default(0);

		});
		Schema::create('pna_tasks', function(Blueprint $table)
		{
		    $table->increments('id');
		    $table->text('task_title')->nullable();
		    $table->text('task_content')->nullable();
		    $table->dateTime('task_due')->nullable();;
		    $table->integer('task_setter')->nullable();;
		    $table->integer('task_status')->default(0);
		    $table->integer('task_assign')->default(0);
		    $table->integer('archived')->default(0);
		    $table->string('task_group')->nullable();
		    $table->text('seenzone')->nullable();
		    $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		    $table->timestamp('updated_at');
		    $table->integer('is_archived')->default(0);
		});
		Schema::create('pna_committee', function(Blueprint $table)
		{
		    $table->increments('id');
		    $table->string('committee_title')->nullable();
		    $table->text('committee_content')->nullable();
		    $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		    $table->timestamp('updated_at');
		    $table->integer('is_archived')->default(0);
		});
			Schema::create('pna_inquiry', function(Blueprint $table)
		{
		    $table->increments('id');
		    $table->integer('type')->default(0);
		    $table->string('name')->nullable();
		    $table->string('subject')->nullable();
		    $table->string('email')->nullable();
		    $table->text('message')->nullable();
		    $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		    $table->timestamp('updated_at');
		    $table->integer('is_archived')->default(0);
		});
			Schema::create('pna_updates_category', function(Blueprint $table)
		{
		    $table->increments('id');
		    $table->string('category_name')->nullable();
		    $table->string('category_color')->nullable();
		    $table->integer('category_setter')->default(0);
		    $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		    $table->timestamp('updated_at');
		    $table->integer('is_archived')->default(0);
		});
  	Schema::create('pna_folders', function(Blueprint $table)
		{
		    $table->increments('id');
		    $table->integer('folder_owner')->default(0);
		    $table->string('folder_name')->nullable();
		    $table->string('folder_desc')->nullable();
		    $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		    $table->timestamp('updated_at');
		});
  		Schema::create('pna_mail', function(Blueprint $table)
		{
		    $table->increments('id');
		    $table->integer('type')->default(0);
		    $table->integer('status')->default(0);
		    $table->string('thread')->nullable();
		    $table->string('subject')->nullable();
		    $table->integer('recepient')->default(0);
		    $table->integer('sender')->default(0);
		    $table->text('message')->nullable();
		    $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		    $table->timestamp('updated_at');
		    $table->integer('is_archived')->default(0);
		});


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pna_transactions');
		Schema::drop('pna_roles');
		Schema::drop('pna_users');
		Schema::drop('pna_updates');
		Schema::drop('pna_tasks');
		Schema::drop('pna_committee');
		Schema::drop('pna_inquiry');
		Schema::drop('pna_updates_category');
 	Schema::drop('pna_folders');
 	Schema::drop('pna_mail');
	}

}
