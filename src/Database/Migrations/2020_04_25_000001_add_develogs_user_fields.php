<?php

use Illuminate\Database\Migrations\Migration;

class AddDevelogsUserFields extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            if (!Schema::hasColumn('users', 'avatar')) {
                $table->string('avatar')->nullable()->after('email')->default('app-assets/images/portrait/small/avatar-s-2.jpg');
            }
            $table->string('username')->unique()->nullable()->after('avatar');
            $table->string('about')->nullable()->after('username');
            $table->date('birthday')->nullable()->after('about');
            $table->string('phone')->nullable()->after('birthday');
            $table->json('setting')->nullable()->after('phone');
            $table->string('recoverToken')->nullable()->after('setting');
            $table->string('address')->nullable()->after('recoverToken');
            $table->string('website')->nullable()->after('address');
            $table->json('socialMedia')->nullable()->after('website');
            $table->timestamp('lastLogin')->nullable()->after('socialMedia');
            $table->boolean('active')->default(1)->after('lastLogin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        if (Schema::hasColumn('users', 'avatar')) {
            Schema::table('users', function ($table) {
                $table->dropColumn('avatar');
            });
        }
        if (Schema::hasColumn('users', 'role_id')) {
            Schema::table('users', function ($table) {
                $table->dropColumn('role_id');
            });
        }
    }
}



