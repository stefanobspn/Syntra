import { Users, CheckCircle, Clock, TrendingUp, LogOut } from 'lucide-react';
import { useNavigate } from 'react-router';

export function TeacherDashboard() {
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
                <p className="text-xs text-muted-foreground">Dashboard Guru Pembimbing</p>
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
          <h2 className="text-3xl font-bold text-foreground mb-2">Dashboard Pembimbing</h2>
          <p className="text-muted-foreground">Pantau dan bimbing siswa PKL Anda</p>
        </div>

        {/* Stats Cards */}
        <div className="grid md:grid-cols-4 gap-6 mb-8">
          <div className="bg-white rounded-xl p-6 border border-border">
            <div className="flex items-center gap-3 mb-2">
              <div className="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                <Users className="text-blue-600" size={20} />
              </div>
              <div>
                <p className="text-2xl font-bold text-foreground">24</p>
                <p className="text-sm text-muted-foreground">Total Siswa</p>
              </div>
            </div>
          </div>

          <div className="bg-white rounded-xl p-6 border border-border">
            <div className="flex items-center gap-3 mb-2">
              <div className="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                <Clock className="text-yellow-600" size={20} />
              </div>
              <div>
                <p className="text-2xl font-bold text-foreground">12</p>
                <p className="text-sm text-muted-foreground">Perlu Review</p>
              </div>
            </div>
          </div>

          <div className="bg-white rounded-xl p-6 border border-border">
            <div className="flex items-center gap-3 mb-2">
              <div className="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                <CheckCircle className="text-green-600" size={20} />
              </div>
              <div>
                <p className="text-2xl font-bold text-foreground">156</p>
                <p className="text-sm text-muted-foreground">Jurnal Disetujui</p>
              </div>
            </div>
          </div>

          <div className="bg-white rounded-xl p-6 border border-border">
            <div className="flex items-center gap-3 mb-2">
              <div className="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                <TrendingUp className="text-indigo-600" size={20} />
              </div>
              <div>
                <p className="text-2xl font-bold text-foreground">89%</p>
                <p className="text-sm text-muted-foreground">Rata-rata Progress</p>
              </div>
            </div>
          </div>
        </div>

        {/* Students List */}
        <div className="bg-white rounded-2xl p-6 border border-border">
          <h3 className="text-xl font-semibold text-foreground mb-6">Daftar Siswa Bimbingan</h3>
          <div className="space-y-3">
            {[
              { name: 'Ahmad Fauzi', company: 'PT Digital Solutions', progress: 93, pending: 3 },
              { name: 'Siti Nurhaliza', company: 'CV Tech Innovate', progress: 87, pending: 5 },
              { name: 'Budi Santoso', company: 'PT Maju Jaya', progress: 76, pending: 2 },
              { name: 'Dewi Lestari', company: 'PT Creative Studio', progress: 95, pending: 1 },
            ].map((student, idx) => (
              <div key={idx} className="flex items-center justify-between p-4 rounded-xl bg-muted/30 hover:bg-muted/50 transition-colors">
                <div className="flex items-center gap-4">
                  <div className="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-full flex items-center justify-center">
                    <span className="text-white font-semibold">{student.name.charAt(0)}</span>
                  </div>
                  <div>
                    <p className="font-medium text-foreground">{student.name}</p>
                    <p className="text-sm text-muted-foreground">{student.company}</p>
                  </div>
                </div>
                <div className="flex items-center gap-6">
                  <div className="text-right">
                    <p className="text-sm text-muted-foreground">Progress</p>
                    <p className="font-semibold text-foreground">{student.progress}%</p>
                  </div>
                  <div className="text-right">
                    <p className="text-sm text-muted-foreground">Pending</p>
                    <p className="font-semibold text-yellow-600">{student.pending}</p>
                  </div>
                  <button className="px-4 py-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors">
                    Review
                  </button>
                </div>
              </div>
            ))}
          </div>
        </div>
      </div>
    </div>
  );
}
