import { BookOpen, Calendar, Clock, FileText, LogOut } from 'lucide-react';
import { useNavigate } from 'react-router';

export function StudentDashboard() {
  const navigate = useNavigate();

  return (
    <div className="min-h-screen bg-background">
      {/* Header */}
      <header className="bg-white border-b border-border">
        <div className="px-6 py-4">
          <div className="flex items-center justify-between">
            <div className="flex items-center gap-3">
              <div className="w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-lg flex items-center justify-center">
                <span className="text-white font-bold text-lg">S</span>
              </div>
              <div>
                <h1 className="font-semibold text-lg text-foreground">Syntra</h1>
                <p className="text-xs text-muted-foreground">Dashboard Siswa</p>
              </div>
            </div>
            <button
              onClick={() => navigate('/')}
              className="flex items-center gap-2 px-4 py-2 text-muted-foreground hover:text-foreground transition-colors"
            >
              <LogOut size={18} />
              Keluar
            </button>
          </div>
        </div>
      </header>

      <div className="max-w-7xl mx-auto px-6 py-8">
        {/* Welcome Section */}
        <div className="mb-8">
          <h2 className="text-3xl font-bold text-foreground mb-2">Selamat Datang, Ahmad!</h2>
          <p className="text-muted-foreground">Pantau progress PKL Anda di sini</p>
        </div>

        {/* Stats Cards */}
        <div className="grid md:grid-cols-4 gap-6 mb-8">
          <div className="bg-white rounded-xl p-6 border border-border">
            <div className="flex items-center gap-3 mb-2">
              <div className="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                <Calendar className="text-blue-600" size={20} />
              </div>
              <div>
                <p className="text-2xl font-bold text-foreground">45</p>
                <p className="text-sm text-muted-foreground">Hari PKL</p>
              </div>
            </div>
          </div>

          <div className="bg-white rounded-xl p-6 border border-border">
            <div className="flex items-center gap-3 mb-2">
              <div className="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                <FileText className="text-green-600" size={20} />
              </div>
              <div>
                <p className="text-2xl font-bold text-foreground">42</p>
                <p className="text-sm text-muted-foreground">Jurnal Terisi</p>
              </div>
            </div>
          </div>

          <div className="bg-white rounded-xl p-6 border border-border">
            <div className="flex items-center gap-3 mb-2">
              <div className="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                <Clock className="text-yellow-600" size={20} />
              </div>
              <div>
                <p className="text-2xl font-bold text-foreground">3</p>
                <p className="text-sm text-muted-foreground">Pending Review</p>
              </div>
            </div>
          </div>

          <div className="bg-white rounded-xl p-6 border border-border">
            <div className="flex items-center gap-3 mb-2">
              <div className="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                <BookOpen className="text-indigo-600" size={20} />
              </div>
              <div>
                <p className="text-2xl font-bold text-foreground">93%</p>
                <p className="text-sm text-muted-foreground">Progress</p>
              </div>
            </div>
          </div>
        </div>

        {/* Recent Journals */}
        <div className="bg-white rounded-2xl p-6 border border-border">
          <h3 className="text-xl font-semibold text-foreground mb-6">Jurnal Terbaru</h3>
          <div className="space-y-4">
            {[
              { date: '15 Mei 2026', status: 'Disetujui', activity: 'Membuat dokumentasi API endpoints' },
              { date: '14 Mei 2026', status: 'Pending', activity: 'Testing fitur authentication' },
              { date: '13 Mei 2026', status: 'Disetujui', activity: 'Implementasi UI dashboard admin' },
            ].map((journal, idx) => (
              <div key={idx} className="flex items-center justify-between p-4 rounded-xl bg-muted/30 hover:bg-muted/50 transition-colors">
                <div className="flex items-center gap-4">
                  <div className="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <FileText className="text-blue-600" size={20} />
                  </div>
                  <div>
                    <p className="font-medium text-foreground">{journal.activity}</p>
                    <p className="text-sm text-muted-foreground">{journal.date}</p>
                  </div>
                </div>
                <span
                  className={`px-3 py-1 rounded-full text-sm ${
                    journal.status === 'Disetujui'
                      ? 'bg-green-100 text-green-700'
                      : 'bg-yellow-100 text-yellow-700'
                  }`}
                >
                  {journal.status}
                </span>
              </div>
            ))}
          </div>
        </div>
      </div>
    </div>
  );
}
