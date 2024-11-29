<?php

namespace App\Http\Controllers\Admin\Expense;

use App\Models\Expense;
use App\Models\Operation;
use App\Models\Category;
use App\Models\Branch; // Branch modelini import qilish
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        // Barcha xarajatlarni olish, bog'liq operatsiya va kategoriya bilan birga
        $expenses = Expense::with(['operation', 'category', 'branch'])->get(); 
        return view('pages.expense.index', compact('expenses'));
    }

    public function create()
    {
        $operations = Operation::all();
        $categories = Category::all();
        $branches = Branch::all(); // Barcha filiallarni olish
        return view('pages.expense.create', compact('operations', 'categories', 'branches'));
    }

    public function store(Request $request)
    {
        // Ma'lumotlarni validatsiya qilish
        $request->validate([
            'operation_id' => 'required|exists:operations,id',
            'category_id' => 'required|exists:categories,id',
            'branch_id' => 'required|exists:branches,id', // Branchni tekshirish
            'amount' => 'required|numeric',
            'expense_date' => 'required|date',
            'comment' => 'nullable|string',
        ]);

        // Yangi xarajatni yaratish
        Expense::create($request->all());

        return redirect()->route('expenses.index')->with('success', 'Xarajat muvaffaqiyatli qo\'shildi.');
    }

    public function show($id)
    {
        // Ma'lum bir xarajatni ko'rsatish
        $expense = Expense::with(['operation', 'category', 'branch'])->findOrFail($id);
        return view('pages.expense.show', compact('expense'));
    }

    public function edit($id)
    {
        $expense = Expense::findOrFail($id);
        $operations = Operation::all();
        $categories = Category::all();
        $branches = Branch::all(); // Barcha filiallarni olish
        return view('pages.expense.edit', compact('expense', 'operations', 'categories', 'branches'));
    }

    public function update(Request $request, $id)
    {
        // Ma'lumotlarni validatsiya qilish
        $request->validate([
            'operation_id' => 'required|exists:operations,id',
            'category_id' => 'required|exists:categories,id',
            'branch_id' => 'required|exists:branches,id', // Branchni tekshirish
            'amount' => 'required|numeric',
            'expense_date' => 'required|date',
            'comment' => 'nullable|string',
        ]);

        // Xarajatni yangilash
        $expense = Expense::findOrFail($id);
        $expense->update($request->all());

        return redirect()->route('expenses.index')->with('success', 'Xarajat muvaffaqiyatli yangilandi.');
    }

    public function destroy($id)
    {
        // Xarajatni o'chirish
        $expense = Expense::findOrFail($id);
        $expense->delete();

        return redirect()->route('expenses.index')->with('success', 'Xarajat muvaffaqiyatli o\'chirildi.');
    }
}
