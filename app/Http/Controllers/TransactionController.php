<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Student;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allBill    = Bill::all();
        $allPayer   = User::all();
        $allStudent = Student::all();

        return view('admin.pages.transaction.create')->with([
            'allBill'    => $allBill,
            'allPayer'   => $allPayer,
            'allStudent' => $allStudent
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Transaction::create([
            'users_id'     => $request->users_id,
            'students_id'  => $request->students_id,
            'bills_id'     => $request->bills_id,
            'amount'       => $request->amount
        ]);

        return redirect()->route('dashboard.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        $allBill    = Bill::all();
        $allPayer   = User::all();
        $allStudent = Student::all();
        return view('admin.pages.transaction.edit')->with([
            'transaction' => $transaction,
            'allBill'    => $allBill,
            'allPayer'   => $allPayer,
            'allStudent' => $allStudent
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $transaction = Transaction::findOrFail($id);
        $transaction->update($data);

        return redirect()->route('dashboard.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaction::find($id)->delete();
        return redirect()->route('dashboard.index')->with('Success', 'Student deleted');
    }
}
